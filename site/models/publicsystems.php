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
		
		$query->join('LEFT OUTER', '#__ropo_systems s2 ON s1.regno = s2.regno AND s1.version < s2.version');
		
		$query->where(array("s1.state='APPROVED'", 's2.version IS NULL'));
		// From the systems
		
		$query->order($db->getEscaped($this->getState('filter_order', 's1.modified_time')) . ' ' . $db->getEscaped($this->getState('filter_order_Dir', 'DESC')));
		return $query;
	}
}
