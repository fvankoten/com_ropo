<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
jimport('joomla.log.log');
require_once(JPATH_LIBRARIES .'/nusoap/lib/nusoap.php');

/**
 * Services Controller
 */
class RopoControllerServices extends JControllerLegacy
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		JLog::addLogger(array('text_file' => 'com_ropo.error.php'),
				//Sets all JLog messages to be set to the file
				JLog::ALL,
				//Chooses a category name
				'com_ropo'
		);
	}
	
	public function getSystems() {
		JLog::add('Entering getSystems', JLog::INFO);
		
		$model = $this->getModel('systems');
		$items = $model->getSystems('VALID');
		
		return $items;
	}

	public function soap() {
		JLog::add('Entering soap', JLog::INFO);
		
		$method = 'getSystems';
		$class = get_class($this);
		$fObj = new ReflectionMethod($class, $method);
		JLog::add($fObj->getName(), JLog::INFO);
		
		$namespace = JURI::base() . 'roposervices';
		$endpoint = JURI::base() . 'index.php?'.urlencode('option=com_ropo&task=services.soap&format=xmlrpc');

		$server = new soap_server();
		$server->configureWSDL('ropo', 'urn:'.$namespace, $endpoint /*urlencode($endpoint)*/);
		
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
						'state' => array('name' => 'state', 'type' => 'xsd:string'),
						'asset_id' => array('name' => 'asset_id', 'type' => 'xsd:int'),
						'identificationdata_controller_name' => array('name' => 'identificationdata_controller_name', 'type' => 'xsd:string'),
						'identificationdata_controller_address1' => array('name' => 'identificationdata_controller_address1', 'type' => 'xsd:string'),
						'identificationdata_controller_postalcode' => array('name' => 'identificationdata_controller_postalcode', 'type' => 'xsd:string'),
						'identificationdata_controller_city' => array('name' => 'identificationdata_controller_city', 'type' => 'xsd:string')
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
				$class.'.'.$method, // method name
				array(), // input parameters
				array('return' => 'tns:systemList'), // output parameters
				'urn:'.$namespace, // namespace
				'urn:'.$namespace . '#'.$class.'.'.$method, // soapaction
				'rpc', // style
				'encoded', // use
				'Get all Processing Systems' // documentation
		);

		// Use the request to (try to) invoke the service
		global $HTTP_RAW_POST_DATA;
		$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : file_get_contents("php://input");
		$server->service($HTTP_RAW_POST_DATA);
				
		jexit();

		exit();
	}
}