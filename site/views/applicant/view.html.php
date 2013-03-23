<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Applicant View
 */
class RopoViewApplicant extends RopoViewBase
{
	protected $_title = 'COM_ROPO_APPLICANT';
	public $currentChapter = 13;
	public $help = "COM_ROPO_APPLICANT_HELP";
	
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
        $bar->appendButton('Frontend', 'back', 'COM_ROPO_SYSTEM_TOOLBAR_PREV', 'system.prev', false);
        $bar->appendButton('Frontend', 'publish', 'COM_ROPO_SYSTEM_TOOLBAR_COMMIT', 'system.commit', false);
        
        //generate the html and return
        return $bar->render();
	}
}