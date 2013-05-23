<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ropoview.php' );

/**
 * System View
 */
class RopoViewSystem extends RopoViewBase
{
	
	protected $canDo;
	public $isNew;
	public $currentChapter = 1;
	public $help = "COM_ROPO_SYSTEM_HELP";
	
	/**
	 * display method of System view
	 * @return void
	 */
	public function display($tpl = null)
	{
		// get the Data
		$form = $this->get('Form');
		$item = $this->get('Item');
		
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}
		// Assign the Data
		$this->form = $form;
		$this->item = $item;
		$this->canDo = RopoHelper::getActions($this->item->id);
		$this->isNew = ($item->id == 0);
		$this->_title = ($item->id > 0 ? JText::_('COM_ROPO_SYSTEM_EDIT') : JText::_('COM_ROPO_SYSTEM_NEW')); 

		// Display the template
		parent::display($tpl);
	}
	
	function getToolbar() {
		// add required stylesheets from admin template
		$document = JFactory::getDocument();
		$document->addStyleSheet('administrator/templates/system/css/system.css');
		$document->addStyleSheet('media/com_ropo/css/ropo.css');
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
        $bar->appendButton('Frontend', 'cancel', 'COM_ROPO_SYSTEM_TOOLBAR_CANCEL', 'system.cancel', false);
        if ($this->canDo->get('core.edit.own') || $this->canDo->get('core.edit')) {
        	$bar->appendButton('Frontend', 'forward', 'COM_ROPO_SYSTEM_TOOLBAR_NEXT', 'system.next', false);
        }

        //generate the html and return
        return $bar->render();
	}
}