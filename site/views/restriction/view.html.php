<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Restriction View
 */
class RopoViewRestriction extends RopoViewBase
{
	protected $_title = 'COM_ROPO_RESTRICTION';
	public $currentChapter = 8;
	public $help = "COM_ROPO_RESTRICTION_HELP";
}