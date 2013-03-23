<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Personaldata View
 */
class RopoViewPersonaldata extends RopoViewBase
{
	protected $_title = 'COM_ROPO_PERSONALDATA_CATEGORIES';
	public $currentChapter = 6;
	public $help = "COM_ROPO_PERSONALDATA_CATEGORIES_HELP";
}