<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ropoview.php' );

/**
 * Purpose View
 */
class RopoViewPurpose extends RopoViewBase
{
	protected $_title = 'COM_ROPO_PURPOSE';
	public $currentChapter = 3;
	public $help = "COM_ROPO_PURPOSE_HELP";
}