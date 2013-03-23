<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Security View
 */
class RopoViewSecurity extends RopoViewBase
{
	protected $_title = 'COM_ROPO_SECURITY_MEASURES';
	public $currentChapter = 12;
	public $help = "COM_ROPO_SECURITY_MEASURES_HELP";
}