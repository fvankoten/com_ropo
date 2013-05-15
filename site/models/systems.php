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
		$query->select('s1.id, s1.regno, s1.version, s1.title, s1.created_time, s1.modified_time, s1.state, s1.identificationdata_controller_name');
		$query->from('#__ropo_systems s1');
		
		$query->join('LEFT OUTER', '#__ropo_systems s2 ON s1.regno = s2.regno AND s1.version < s2.version');
		
		$query->where("(s1.created_user_id='" . $user->get('id') . "' OR s1.modified_user_id='" . $user->get('id') . "') AND s2.version IS NULL");
		
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
	
	public function getSystems($state = null) {
		$items = array();
				
		// Create a new query object.
		$query = $this->_db->getQuery(true);
		// Select some fields
		$query->select('id,regno,version,title,created_time,modified_time,state,asset_id,'
						. 'identificationdata_controller_name,identificationdata_controller_address1,identificationdata_controller_postalcode,'
						. 'identificationdata_controller_city');
		// From the systems
		$query->from('#__ropo_systems');
		
		if ($state != null && $state != '') {
			$query->where("state='". $state . "'");
		} else {
			// $query->where("state='VALID'");
		}
		
		$this->_db->setQuery($query);
		return $this->_db->loadAssocList();
	}
}
