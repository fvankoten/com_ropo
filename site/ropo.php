<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import joomla controller library
jimport('joomla.application.component.controller');

JLoader::register('JToolbarButtonFrontend', dirname(__FILE__).DIRECTORY_SEPARATOR.'buttons'.DIRECTORY_SEPARATOR.'frontend2.php');
JLoader::register('JButtonFrontend', dirname(__FILE__).DIRECTORY_SEPARATOR.'buttons'.DIRECTORY_SEPARATOR.'frontend.php');
// require helper file
JLoader::register('RopoHelper', dirname(__FILE__).DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'ropo.php');

// Get an instance of the controller prefixed by Ropo
$controller = JControllerLegacy::getInstance('Ropo');

// Perform the Request task
$input = JFactory::getApplication()->input;
$task = $input->get('task', "", 'STR' );
		
// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();