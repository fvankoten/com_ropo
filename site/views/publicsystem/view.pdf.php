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
		
		$document = JFactory::getDocument();
		$document->addStyleSheet('media/com_ropo/css/ropo.css');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->item = $item;
		
		$document = JFactory::getDocument();
		$document->setName($this->item->title);
		
		// Display the template
		parent::display('pdf');
	}
}