<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Disclosure View
 */
class RopoViewDisclosure extends RopoViewBase
{
	protected $_title = 'COM_ROPO_DISCLOSURE';
	public $currentChapter = 9;
	public $help = "COM_ROPO_DISCLOSURE_HELP";
}