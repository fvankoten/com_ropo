<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DS.'system.php' );

/**
 * Identificationdata Model
 */
class RopoModelIdentificationdata extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'identificationdata';
	}
	
}