<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ropoview.php' );

/**
 * Linkedsystem View
 */
class RopoViewLinkedsystem extends RopoViewBase
{
	protected $_title = 'COM_ROPO_LINKED_FILING_SYSTEMS';
	public $currentChapter = 11;
	public $help = "COM_ROPO_LINKED_FILING_SYSTEMS_HELP";
}