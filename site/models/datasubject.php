<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DS.'system.php' );

/**
 * Datasubject Model
 */
class RopoModelDatasubject extends RopoModelSystem
{
	
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'datasubject';
	}

	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$cb1 = $data['datasubject_civil_servants'];
		$cb2 = $data['datasubject_clients'];
		$cb3 = $data['datasubject_employees'];
		$cb4 = $data['datasubject_members'];
		$cb5 = $data['datasubject_patients'];
		$cb6 = $data['datasubject_shareholders'];
		$cb7 = $data['datasubject_social_assistence_users'];
		$cb8 = $data['datasubject_students'];
		$cb9 = $data['datasubject_suppliers'];
		
		$valid &= (($cb1 + $cb2 + $cb3 + $cb4 + $cb5 + $cb6 + $cb7 + $cb8 + $cb9 > 0)
					|| $data['datasubject_other'] != '');
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_DATASUBJECT_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}