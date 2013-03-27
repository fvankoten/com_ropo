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
	
	protected $state;
	protected $item;
	
	// Overwriting JView display method
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$params = $app->getParams();

		// Get some data from the models
		$this->state = $this->get('State');
		$this->item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
				
		// Display the template
		parent::display($tpl);
	}
}