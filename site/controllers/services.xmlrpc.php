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
	public function test()
	{
		$params = xmlrpc_decode($_POST['params']);
		$params[] = "new from rpccall";
		echo xmlrpc_encode ($params);
	}
}