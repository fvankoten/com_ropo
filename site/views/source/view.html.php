<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ropoview.php' );

/**
 * Source View
 */
class RopoViewSource extends RopoViewBase
{
	protected $_title = 'COM_ROPO_MANNER_OF_COLLECTION';
	public $currentChapter = 4;
	public $help = "COM_ROPO_MANNER_OF_COLLECTION_HELP";
}