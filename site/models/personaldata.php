<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'system.php' );

/**
 * Personaldata Model
 */
class RopoModelPersonaldata extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'personaldata';
	}
	
	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$cb1 = $data['personaldata_health'];
		$cb2 = $data['personaldata_political_opinions'];
		$cb3 = $data['personaldata_racial_origin'];
		$cb4 = $data['personaldata_religious_beliefs'];
		$cb5 = $data['personaldata_sexlife'];
		$cb6 = $data['personaldata_trade_union_membership'];
	
		$valid &= ($cb1 + $cb2 + $cb3 + $cb4 + $cb5 + $cb6 > 0);
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_PERSONALDATA_SPECIAL_ERROR'));
			$result = false;
		}
		
		$valid = true;
		$cb1 = $data['personaldata_biometric_data'];
		$cb2 = $data['personaldata_identification_data'];
		$cb3 = $data['personaldata_personal_detail_data'];
		$cb4 = $data['personaldata_address_detail_data'];
		$cb5 = $data['personaldata_residence_details'];
		$cb6 = $data['personaldata_video_surveillance'];
		$cb7 = $data['personaldata_economic_data'];
		$cb8 = $data['personaldata_professional_life'];
		$cb9 = $data['personaldata_audio'];
		$cb10 = $data['personaldata_photo'];
		
		$valid &= (($cb1 + $cb2 + $cb3 + $cb4 + $cb5 + $cb6 + $cb7 + $cb8 + $cb9 + $cb10 > 0)
					|| ($data['personaldata_other'] != ''));
		
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_PERSONALDATA_OTHER_ERROR'));
			$result = false;
		}
	
		return $result;
	}
	
}