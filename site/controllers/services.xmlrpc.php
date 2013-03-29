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
		
		return $items;
	}

	public function soap() {
		$namespace = JURI::base() . 'roposervices';
		$endpoint = JURI::base() . 'index.php?option=com_ropo&task=services.soap&format=xmlrpc';

		$server = new soap_server();
		$server->configureWSDL('ropo', $namespace, urlencode($endpoint));
		
		$server->wsdl->addComplexType(
				'system', // name
				'complextType', // typeClass (complexType|simpleType|attribute)
				'struct', // phpType: currently supported are array and struct (php assoc array)
				'all', // compositor (all|sequence|choice)
				'', // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
				// elements = array ( name = array(name=>'',type=>'') )
				array(
						'id' => array('name' => 'id', 'type' => 'xsd:int'),
						'regno' => array('name' => 'regno', 'type' => 'xsd:int'),
						'version' => array('name' => 'version', 'type' => 'xsd:int'),
						'title' => array('name' => 'title', 'type' => 'xsd:string'),
						'created_time' => array('name' => 'created_time', 'type' => 'xsd:string'),
						'modified_time' => array('name' => 'modified_time', 'type' => 'xsd:string'),
						'state' => array('name' => 'state', 'type' => 'xsd:string')
				)
		);
		
		$server->wsdl->addComplexType(
				'systemList', // name
				'complextType', // typeClass (complexType|simpleType|attribute)
				'array', // phpType: currently supported are array and struct (php assoc array)
				'', // compositor (all|sequence|choice)
				'SOAP-ENC:Array', // restrictionBase namespace:name (http://schemas.xmlsoap.org/soap/encoding/:Array)
				// elements = array ( name = array(name=>'',type=>'') )
				array(),
				// attrs
				array(
						array(
								'ref' => 'SOAP-ENC:arrayType',
								'wsdl:arrayType' => 'tns:system[]'
						)
				),
				// arrayType: namespace:name (http://www.w3.org/2001/XMLSchema:string)
				'tns:system'
		);

		$server->register(
				'getSystems', // method name
				array(), // input parameters
				array('return' => 'tns:systemList'), // output parameters
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