<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Ropo Component
 */
class RopoViewPublicsystems extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null)
	{
		// get the Data
		$items = $this->get('Items');
		$state = $this->get('State');
		$pagination = $this->get('Pagination');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->items = $items;
		$this->sortDirection = $state->get('filter_order_Dir');
		$this->sortColumn = $state->get('filter_order');
		$this->pagination = $pagination;

		// Display the template
		parent::display($tpl);
	}

}