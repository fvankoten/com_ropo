<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'ropoview.php' );

/**
 * Identificationdata View
 */
class RopoViewIdentificationdata extends RopoViewBase
{
	protected $_title = 'COM_ROPO_IDENTIFICATIONDATA';
	public $currentChapter = 2;
	public $help = "COM_ROPO_IDENTIFICATIONDATA_HELP";
}