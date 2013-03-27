<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * PublicSystem Model
*/
class RopoModelPublicsystem extends JModelItem
{
	/**
	 * Model context string.
	 *
	 * @access	protected
	 * @var		string
	 */
	protected $_context = 'com_ropo.publicsystem';

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication();
		$params	= $app->getParams();

		// Load the object state.
		$id	= JRequest::getInt('id');
		$this->setState('publicsystem.id', $id);

		// Load the parameters.
		$this->setState('params', $params);
	}

	/**
	 * Method to get an ojbect.
	 *
	 * @param	integer	The id of the object to get.
	 * @return	mixed	Object on success, false on failure.
	 */
	public function getItem($id = null)
	{
		if ($this->_item === null)
		{
			$this->_item = false;

			if (empty($id)) {
				$id = $this->getState('publicsystem.id');
			}

			// Get a level row instance.
			$table = JTable::getInstance('System', 'RopoTable');

			// Attempt to load the row.
			if ($table->load($id))
			{
				// Convert the JTable to a clean JObject.
				$properties = $table->getProperties(1);
				$this->_item = JArrayHelper::toObject($properties, 'JObject');
			}
			elseif ($error = $table->getError()) {
				$this->setError($error);
			}
		}

		return $this->_item;
	}
}