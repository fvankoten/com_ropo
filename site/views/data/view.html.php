<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Data View
 */
class RopoViewData extends RopoViewBase
{
	protected $_title = 'COM_ROPO_DATA_DURATION_AND_STORAGE';
	public $currentChapter = 7;
	public $help = "COM_ROPO_DATA_DURATION_AND_STORAGE_HELP";
}