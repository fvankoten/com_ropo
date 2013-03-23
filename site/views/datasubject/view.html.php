<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Datasubject View
 */
class RopoViewDatasubject extends RopoViewBase
{
	protected $_title = 'COM_ROPO_DATASUBJECT';
	public $currentChapter = 5;
	public $help = "COM_ROPO_DATASUBJECT_HELP";
}