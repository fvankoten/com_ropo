<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelform library
jimport('joomla.application.component.modeladmin');

/**
 * System Model
 */
class RopoModelSystem extends JModelAdmin
{
	protected $_identifier;
	
	protected $_checkboxes = array(
		'datasubject_civil_servants',
		'datasubject_clients',
		'datasubject_employees',
		'datasubject_members',
		'datasubject_patients',
		'datasubject_shareholders',
		'datasubject_social_assistence_users',
		'datasubject_students',
		'datasubject_suppliers',
		'disclosure_enabled',
		'linkedsystem_enabled',
		'personaldata_health',
		'personaldata_political_opinions',
		'personaldata_racial_origin',
		'personaldata_religious_beliefs',
		'personaldata_sexlife',
		'personaldata_trade_union_membership',
		'personaldata_biometric_data',
		'personaldata_identification_data',
		'personaldata_personal_detail_data',
		'personaldata_address_detail_data',
		'personaldata_residence_details',
		'personaldata_video_surveillance',
		'personaldata_economic_data',
		'personaldata_professional_life',
		'personaldata_audio',
		'personaldata_photo',
		'security_transparency_by_document',
		'security_transparency_by_plan',
		'transfer_enabled'
	);
	
	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->_identifier = 'system';
	}
	
	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param       type    The table type to instantiate
	 * @param       string  A prefix for the table class name. Optional.
	 * @param       array   Configuration array for model. Optional.
	 * @return      JTable  A database object
	 * @since       2.5
	 */
	public function getTable($type = 'System', $prefix = 'RopoTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	/**
	 * Method to get the record form.
	 *
	 * @param       array   $data           Data for the form.
	 * @param       boolean $loadData       True if the form is to load its own data (default case), false if not.
	 * @return      mixed   A JForm object on success, false on failure
	 * @since       2.5
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm('com_ropo.' . $this->_identifier, $this->_identifier, array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form))
		{
			return false;
		}
		return $form;
	}
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return      mixed   The data for the form.
	 * @since       2.5
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_ropo.edit.system.data', array());
		if (empty($data))
		{
			$data = $this->getItem();
		}
		return $data;
	}
	
	public function validate($form, $data, $group = null)
	{
		foreach ($this->_checkboxes as $checkbox) {
			if (!isset($data[$checkbox])) {
				$data[$checkbox] = 0;
			}
		}
		
		return parent::validate($form, $data, $group);
	}
	
	protected function prepareTable($table)
	{
		switch($table->state) {
			case 'INVALID':
			case 'VALID':
				if ($table->version == 0) $table->version = 1;
				break;
			case 'eRECEIVED':
			case 'pRECEIVED':
			case 'REC_NOTIFIED':
			case 'ASSIGNED':
			case 'DECLINED':
			case 'APPROVED':
			case 'EXTENSION':
			case 'DELETED':
				$table->id = 0;
				$table->version++;
				$table->state = 'INVALID';
				break;
			default:
				break;
		}
	}
	
	/**
	 * Method to delete one or more records.
	 *
	 * @param   array  &$pks  An array of record primary keys.
	 *
	 * @return  boolean  True if successful, false if an error occurs.
	 *
	 * @since   12.2
	 */
	public function delete(&$pks) {
		$pks = (array) $pks;
		foreach ($pks as $i => $pk) {
			if (false == $this->setSystemState($pk, 'DELETED')) return false;
		}
		return true;
	}
	
	
	public function setSystemState($id, $state) {
		if ($id <= 0) return false;
		switch ($state) {
			case 'INVALID':
			case 'VALID':
			case 'eRECEIVED':
			case 'pRECEIVED':
			case 'REC_NOTIFIED':
			case 'ASSIGNED':
			case 'DECLINED':
			case 'APPROVED':
			case 'EXTENSION':
			case 'DELETED':
				break;
			default:
				return false;
		}
		
		$data = array('id' => $id, 'state' => $state);
		$table = $this->getTable();
		// Load the row
		$table->load($id);
		// Bind the data
		if (!$table->bind($data))
		{
			$this->setError($table->getError());
			return false;
		}
		// Check the data.
		if (!$table->check())
		{
			$this->setError($table->getError());
			return false;
		}
		// Store the data.
		if (!$table->store())
		{
			$this->setError($table->getError());
			return false;
		}
		// Clean the cache.
		$this->cleanCache();
		
		return true;
	}
}