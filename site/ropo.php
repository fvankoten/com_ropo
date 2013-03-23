<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

JLoader::register('JButtonFrontend', dirname(__FILE__) . DS . 'buttons' . DS . 'frontend.php');
// require helper file
JLoader::register('RopoHelper', dirname(__FILE__) . '/helpers/ropo.php');

// Get an instance of the controller prefixed by Ropo
$controller = JControllerLegacy::getInstance('Ropo');

// Perform the Request task
$input = JFactory::getApplication()->input;
$task = $input->get('task', "", 'STR' );
		
// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();