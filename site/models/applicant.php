<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'system.php' );

/**
 * Applicant Model
 */
class RopoModelApplicant extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'applicant';
	}
	
	public function save($data)
	{
		$data['state'] = 'VALID';
		return parent::save($data);
	}
	
}