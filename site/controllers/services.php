<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');
require_once(JPATH_LIBRARIES .'/nusoap/lib/nusoap.php');

/**
 * Systems Controller
 */
class RopoControllerServices extends JControllerLegacy
{
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask('test', 'test');
	}


	public function test()
	{
		$wsdlurl = JURI::base().'index.php?'.urlencode('option=com_ropo&task=services.soap&format=xmlrpc&wsdl');
		// Create the client instance
		$client = new SoapClient($wsdlurl, array()); 
		
		try {
			$result = $client->__call('RopoControllerServices.getSystems', array());
			echo "<pre>";
			print_r($result);
			echo "<pre>";
		} catch (SoapFault $fault) {
			echo "<pre style=\"color: red;\">";
			print_r($fault);
			echo "<pre>";
		}
		
		exit();
	}
	
	
}