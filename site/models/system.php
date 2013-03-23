<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Ropo System Model
 */
class RopoModelSystem extends JModelItem
{
	/**
	 * @var string msg
	 */
	protected $msg;

	/**
	 * Get the message
	 * @return string The message to be displayed to the user
	 */
	public function getMsg()
	{
		if (!isset($this->msg))
		{
			$this->msg = 'ROPO::System';
		}
		return $this->msg;
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
}