<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DS.'system.php' );

/**
 * Transfer Model
 */
class RopoModelTransfer extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'transfer';
	}

	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$cbTransfer = $data['transfer_enabled'];
		$detail1 = $data['transfer_country'];
		$detail2 = $data['transfer_recipient'];
		$detail3 = $data['transfer_foreign_user'];
		$detail4 = $data['transfer_purpose'];
		$detail5 = $data['transfer_legal_basis'];
		$detail6 = $data['transfer_frequency'];
		$detail7 = $data['transfer_authorization'];
		
	
		$valid &= (($cbTransfer == 0) 
				|| (($detail1 != '') && ($detail2 != '') && ($detail3 != '') && ($detail4 != '') && ($detail5 != '') && ($detail6 != '') && ($detail7 != '')));
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_TRANSFER_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}