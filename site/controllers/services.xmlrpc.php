<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
require_once(JPATH_LIBRARIES .'/nusoap/lib/nusoap.php');

/**
 * Services Controller
 */
class RopoControllerServices extends JControllerLegacy
{

	public function getSystems() {
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

		return "Count of Systems = " . count($items);
	}

	public function wsdl() {
		$namespace = JURI::base() . '?wsdl';

		$server = new soap_server();
		$server->configureWSDL('ropo', $namespace);

		$server->register(
				'getsystems', // method name
				array(), // input parameters
				array('return' => 'xsd:string'), // output parameters
				$namespace, // namespace
				$namespace . '#getsystems', // soapaction
				'rpc', // style
				'encoded', // use
				'Get all Processing Systems' // documentation
		);

		// Use the request to (try to) invoke the service
		$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
		$server->service($HTTP_RAW_POST_DATA);

		exit();
	}
}