<?php
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * This models supports retrieving lists of systems
  */
class RopoModelSystems extends JModelList
{
	
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		$user = JFactory::getUser();
		
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('id,regno,version,title,created_time,modified_time,state');
		$query->where(array("created_user_id='" . $user->get('id') . "'", "modified_user_id='" . $user->get('id') . "'"), "OR");
		// From the systems
		$query->from('#__ropo_systems');
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
