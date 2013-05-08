<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DS.'system.php' );

/**
 * Security Model
 */
class RopoModelSecurity extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'security';
	}

	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$cbDocument = $data['security_transparency_by_document'];
		$detailDocument = $data['security_document_details'];
	
		$valid &= (($cbDocument == 0) || ($detailDocument != ''));
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_SECURITY_TRANSPARENCY_BY_DOCUMENT_ERROR'));
			$result = false;
		}
		
		$valid = true;
		$cbPlan = $data['security_transparency_by_plan'];
		$detailPlan = $data['security_plan_details'];
		
		$valid &= (($cbPlan == 0) || ($detailPlan != ''));
		
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_SECURITY_TRANSPARENCY_BY_PLAN_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}