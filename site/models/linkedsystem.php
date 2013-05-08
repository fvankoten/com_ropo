<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DS.'system.php' );

/**
 * Linkedsystem Model
 */
class RopoModelLinkedsystem extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'linkedsystem';
	}
	
	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$cbChecked = $data['linkedsystem_enabled'];
		$detail1 = $data['linkedsystem_description'];
		$detail2 = $data['linkedsystem_notification'];
		$detail3 = $data['linkedsystem_authorization'];
	
	
		$valid &= (($cbChecked == 0)
				|| (($detail1 != '') && ($detail2 != '') && ($detail3 != '')));
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_LINKED_FILING_SYSTEMS_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}