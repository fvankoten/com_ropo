<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'system.php' );

/**
 * Data Model
 */
class RopoModelData extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'data';
	}
	
	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$basis = $data['data_storage_legal_basis'];
		$purpose = $data['data_storage_purpose'];
	
		$valid &= (($basis != '') || ($purpose != ''));
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_DATA_STORAGE_ERROR'));
			$result = false;
		}
		
		$valid = true;
		$basis = $data['data_usage_legal_basis'];
		$purpose = $data['data_usage_purpose'];
		
		$valid &= (($basis != '') || ($purpose != ''));
		
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_DATA_USAGE_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}