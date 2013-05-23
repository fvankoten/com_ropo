<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'system.php' );

/**
 * Disclosure Model
 */
class RopoModelDisclosure extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'disclosure';
	}

	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$cbDisclosure = $data['disclosure_enabled'];
		$recipient = $data['disclosure_recipient'];
		$purpose = $data['disclosure_purpose'];
	
		$valid &= (($cbDisclosure == 0) || (($recipient != '') && ($purpose != '')));
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_DISCLOSURE_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}