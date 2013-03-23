<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla view library
require_once( dirname(__FILE__).DS.'..'.DS.'ropoview.php' );

/**
 * Transfer View
 */
class RopoViewTransfer extends RopoViewBase
{
	protected $_title = 'COM_ROPO_TRANSFER';
	public $currentChapter = 10;
	public $help = "COM_ROPO_TRANSFER_HELP";
}