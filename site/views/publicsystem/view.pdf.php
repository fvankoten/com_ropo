<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Ropo Component
 */
class RopoViewPublicsystem extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null)
	{
		// get the Data
		$item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->item = $item;
		
		// Display the template
		parent::display('pdf');
	}
}