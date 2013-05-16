<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * This models supports retrieving lists of systems
  */
class RopoModelPublicsystems extends JModelList
{
	
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('s1.id,s1.regno,s1.version,s1.title,s1.created_time,s1.modified_time,s1.state,s1.identificationdata_controller_name');
		$query->from('#__ropo_systems s1');
		$query->where(array("s1.state='APPROVED'"));
		
		$query->order($db->getEscaped($this->getState('filter_order', 's1.modified_time')) . ' ' . $db->getEscaped($this->getState('filter_order_Dir', 'DESC')));
		return $query;
	}
	
	protected function _getList($query, $limitstart = 0, $limit = 0)
	{
		$this->_db->setQuery($query, $limitstart, $limit);
		$items = $this->_db->loadObjectList();
	
		// filter older versions
		$itemsFilterd = array();
		foreach ($items as $item) {
			if (isset($itemsFilterd[$item->regno]) && ($itemsFilterd[$item->regno]->version > $item->version)) {
				// skip
			} else {
				$itemsFilterd[$item->regno] = $item;
			}
		}
			
		return array_values($itemsFilterd);
	}
}
