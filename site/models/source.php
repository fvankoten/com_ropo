<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
require_once( dirname(__FILE__).DIRECTORY_SEPARATOR.'system.php' );

/**
 * Source Model
 */
class RopoModelSource extends RopoModelSystem
{

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'source';
	}
	
	public function validate($form, $data, $group = null)
	{
		$result = parent::validate($form, $data, $group);
	
		$valid = true;
		$manualChecked = $data['sources_manner_manual'];
		$automaticChecked = $data['sources_manner_automatic'];
	
		$valid &= !(($manualChecked == 0) && ($automaticChecked == 0));
	
		if (!$valid) {
			$this->setError(JText::_('COM_ROPO_MANNER_OF_COLLECTION_ERROR'));
			$result = false;
		}
	
		return $result;
	}
}