<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Services Controller
 */
class RopoControllerServices extends JControllerLegacy
{
		
	public function getsystems() {
		$items = array();
		
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('id,regno,version,title,created_time,modified_time,state');
		// From the systems
		$query->from('#__ropo_systems');
		
		$db->setQuery($query);
		$items = $db->loadAssocList();
				
		echo xmlrpc_encode($items);
	}
}