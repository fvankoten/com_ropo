<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * System Controller
*/
class RopoControllerSystem extends JControllerForm
{
	protected $systemviews = array(
			'system',
			'identificationdata',
			'purpose',
			'source',
			'datasubject',
			'personaldata',
			'data',
			'restriction',
			'disclosure',
			'transfer',
			'linkedsystem',
			'security',
			'applicant'
	);

	public function __construct($config = array())
	{
		parent::__construct($config);
		$this->view_list = 'systems';
	}

	public function getModel($name = '', $prefix = '', $config = array('ignore_request' => true))
	{
		if (empty($name)) {
			$name = JRequest::getVar('systemview', 'system', 'post', 'string');
		}
		return parent::getModel($name, $prefix, $config);
	}
	
	protected function allowEdit($data = array(), $key = 'id')
	{
		// Initialise variables.
		$recordId	= (int) isset($data[$key]) ? $data[$key] : 0;
		$user		= JFactory::getUser();
		$userId		= $user->get('id');
		$asset		= 'com_ropo.system.'.$recordId;
		
		// Check general edit permission first.
		if ($user->authorise('core.edit', $asset)) {
			return true;
		}
		
		// Fallback on edit.own.
		// First test if the permission is available.
		if ($user->authorise('core.edit.own', $asset)) {
			// Now test the owner is the user.
			$ownerId	= (int) isset($data['created_user_id']) ? $data['created_user_id'] : 0;
			if (empty($ownerId) && $recordId) {
				// Need to do a lookup from the model.
				$record		= $this->getModel()->getItem($recordId);
		
				if (empty($record)) {
					return false;
				}
		
				$ownerId = $record->created_user_id;
			}
		
			// If the owner matches 'me' then do the test.
			if ($ownerId == $userId) {
				return true;
			}
		}
		
		// Since there is no asset tracking, revert to the component permissions.
		return parent::allowEdit($data, $key);
	}

	public function prev($key = null, $urlVar = null)
	{
		return $this->step(-1, $key, $urlVar);
	}

	public function next($key = null, $urlVar = null)
	{
		return $this->step(1, $key, $urlVar);
	}

	public function step($add, $key = null, $urlVar = null)
	{
		// Initialise variables.
		$view = JRequest::getVar('systemview', 'system', 'post', 'string');
		$app = JFactory::getApplication();
		$model = $this->getModel($view);
		$table = $model->getTable();
		$data  = JRequest::getVar('jform', array(), 'post', 'array');

		$this->task = 'apply';

		// Determine the name of the primary key for the data.
		if (empty($key))
		{
			$key = $table->getKeyName();
		}

		// To avoid data collisions the urlVar may be different from the primary key.
		if (empty($urlVar))
		{
			$urlVar = $key;
		}

		$recordId = JRequest::getInt($urlVar);

		// Populate the row id from the session.
		$data[$key] = $recordId;

		$success = $this->save($key, $urlVar);
		if ($success) {
			$state = $app->getUserState($this->option . '.edit.' . $this->context . '.id');
			$recordId = (int)$state[count($state) - 1];
				
			$currentView = (int)array_search($view, $this->systemviews);
			$currentView += $add;
			if ($currentView < 0 || $currentView >= count($this->systemviews)) {
				$currentView = 0;
			}

			$this->setRedirect(
					JRoute::_(
							'index.php?option=' . $this->option . '&view=' . $this->systemviews[$currentView]
							. $this->getRedirectToItemAppend($recordId, $urlVar), false
					)
			);
		} else {
			$state = $app->getUserState($this->option . '.edit.' . $this->context . '.id');
			$recordId = (int)$state[0];

			$currentView = (int)array_search($view, $this->systemviews);
			$this->setRedirect(
					JRoute::_(
							'index.php?option=' . $this->option . '&view=' . $this->systemviews[$currentView]
							. $this->getRedirectToItemAppend($recordId, $urlVar), false
					)
			);
		}

		return $success;
	}

	public function commit($key = null, $urlVar = null)
	{
		$success = $this->step(0, $key, $urlVar);
		if ($success) {
			$this->setRedirect(
					JRoute::_(
							'index.php?option=' . $this->option . '&view=' . $this->view_list
							. $this->getRedirectToListAppend()
					)
			);
		}

		return $success;
	}
}