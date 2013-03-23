<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

// import Joomla table library
jimport('joomla.database.table');

/**
 * System Table class
 */
class RopoTableSystem extends JTable
{
	
	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function __construct(&$db)
	{
		parent::__construct('#__ropo_systems', 'id', $db);
	}

	public function bind($array, $ignore = '')
	{
		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules'])) {
			$rules = new JAccessRules($array['rules']);
			$this->setRules($rules);
		}
		$success = parent::bind($array, $ignore);
		
		return $success;
	}

	/**
	 * Redefined asset name, as we support action control
	 */
	protected function _getAssetName() {
		$k = $this->_tbl_key;
		return 'com_ropo.system.'.(int) $this->$k;
	}

	/**
	 * We provide our global ACL as parent
	 * @see JTable::_getAssetParentId()
	 */
	protected function _getAssetParentId($table = null, $id = null)
	{
		$asset = JTable::getInstance('Asset');
		$asset->loadByName('com_ropo');
		return $asset->id;
	}

	/**
	 * Stores a system
	 *
	 * @param	boolean	True to update fields even if they are null.
	 * @return	boolean	True on success, false on failure.
	 * @since	1.6
	 */
	public function store($updateNulls = false)
	{
		$date	= JFactory::getDate();
		$user	= JFactory::getUser();
		$isNew = false;
		if ($this->id) {
			// Existing item
		} else {
			// New system
			$isNew = true;
			$this->created_time = $date->toSql();
			$this->created_user_id = $user->get('id');
		}
		$this->modified_time = $date->toSql();
		$this->modified_user_id	= $user->get('id');

		// Attempt to store the data.
		$result = parent::store($updateNulls);
		if ($result && isNew) {
			$this->regno = $this->id;
			$result = parent::store($updateNulls);
		}

		return result;
	}
}