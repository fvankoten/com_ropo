<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controller library
jimport('joomla.application.component.controller');

/**
 * Services Controller
 */
class RopoControllerServices extends JControllerLegacy
{
	
	public function getSystems() {
		$model = $this->getModel('systems');
		$items = $model->getSystems('VALID');
				
		$document = JFactory::getDocument();
		$document->setName('systems');
		
		echo json_encode($items);
	}
	
	public function setState() {
		$id = JRequest::getInt('id');
		$state = JRequest::getString('state');

		$model = $this->getModel('system');
		$result = $model->setSystemState($id, $state);
		
		$document = JFactory::getDocument();
		$document->setName('system');
	
		echo json_encode(array('id' => $id, 'state' => $state, 'result' => $result));
	}
}