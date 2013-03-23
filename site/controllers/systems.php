<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controlleradmin library
jimport('joomla.application.component.controllerlegacy');

/**
 * Systems Controller
 */
class RopoControllerSystems extends JControllerLegacy
{
	public function search() {
		JRequest::setVar("view", "search");
		parent::display();
	}
}