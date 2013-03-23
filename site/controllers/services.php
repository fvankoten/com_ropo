<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Systems Controller
 */
class RopoControllerServices extends JControllerLegacy
{
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask('test',        'test');
	}


	public function test()
	{
		//$params = array ( 'param1' => 'This is param1', 'param2' => 'This is param2');
		$params = array ( 'This is param1', 'This is param2');

		$request_method = 'services.test';
		$request_params = xmlrpc_encode( $params );

		$postdata = http_build_query(array('params' => $request_params));
		$opts = array('http' =>
			array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
				)
		);

		$context  = stream_context_create($opts);
		
		$response = file_get_contents(JURI::base()."index.php?option=com_ropo&task=$request_method&format=xmlrpc", false, $context);
		$params = xmlrpc_decode($response);

		echo "Method name: $request_method";
		echo "<P>Params:";
		print_r ($params);
	}
}