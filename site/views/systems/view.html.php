<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Ropo Component
 */
class RopoViewSystems extends JViewLegacy
{

	protected $canDo;
	protected $state;
	
	// Overwriting JView display method
	function display($tpl = null)
	{
		// get the Data
		$items = $this->get('Items');
		$state = $this->get('State');
		$pagination = $this->get('Pagination');
		
		// Levels filter.
		$options	= array();
		$options[]	= JHtml::_('select.option', 'ALL', JText::_('COM_ROPO_SYSTEMS_FILTER_VERSION_ALL'));
		$options[]	= JHtml::_('select.option', 'NEWEST', JText::_('COM_ROPO_SYSTEMS_FILTER_VERSION_NEWEST'));
		
		$this->f_versions = $options;
		$this->state = $state;

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
		$this->canDo = RopoHelper::getActions();

		// Display the template
		parent::display($tpl);
	}

	function getToolbar() {
		// add required stylesheets from admin template
		$document    = & JFactory::getDocument();
		$document->addStyleSheet('administrator/templates/system/css/system.css');
		$document->addStyleSheet('media/com_ropo/css/toolbar.css');
		
		//now we add the necessary stylesheets from the administrator template
		//in this case i make reference to the bluestork default administrator template in joomla 1.6
		$document->addCustomTag(
			'<link href="administrator/templates/bluestork/css/template.css" rel="stylesheet" type="text/css" />'."\n\n".
            '<!--[if IE 7]>'."\n".
            '<link href="administrator/templates/bluestork/css/ie7.css" rel="stylesheet" type="text/css" />'."\n".
            '<![endif]-->'."\n".
            '<!--[if gte IE 8]>'."\n\n".
            '<link href="administrator/templates/bluestork/css/ie8.css" rel="stylesheet" type="text/css" />'."\n".
            '<![endif]-->'."\n".
            '<link rel="stylesheet" href="administrator/templates/bluestork/css/rounded.css" type="text/css" />'."\n"
        );
        
        // load the JToolBar library and create a toolbar
        jimport('joomla.html.toolbar');
        $bar = new JToolBar('toolbar');
        //and make whatever calls you require
        if ($this->canDo->get('core.create')) {
        	$bar->appendButton('Frontend', 'new', 'COM_ROPO_SYSTEMS_TOOLBAR_NEW', 'system.add', false);
        }
        /*
        if ($this->canDo->get('core.delete')) {
        	$bar->appendButton('Frontend', 'delete', 'COM_ROPO_SYSTEMS_TOOLBAR_DELETE', 'systems.delete', true);
        }
        */
        if ($this->canDo->get('core.edit.own')) {
        	$bar->appendButton('Frontend', 'edit', 'COM_ROPO_SYSTEMS_TOOLBAR_EDIT', 'system.edit', true);
        }

        //generate the html and return
        return $bar->render();
	}
}