<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'system.php' );

/**
 * Purpose Model
 */
class RopoModelPurpose extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'purpose';
	}
	
	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
				
		$valid = true; 
		$byLawChecked = $data['purposes_established_by_law'];
		$byLawDesc = $data['purposes_established_by_law_description'];
					
		$byConsentChecked = $data['purposes_established_by_consent'];
		$byConsentDesc = $data['purposes_established_by_consent_description'];
		
		$valid &= !(($byLawChecked == 1) && ($byLawDesc == ''));
		$valid &= !(($byConsentChecked == 1) && ($byConsentDesc == ''));
		$valid &= !(($byLawChecked == 0) && ($byConsentChecked == 0));
		
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_PURPOSES_ERROR'));
			$result = false;
		}
		
		return $result;
	}
	
}