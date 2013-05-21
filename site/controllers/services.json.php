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
		if ($this->_authorise()) {
			$model = $this->getModel('systems');
			$items = $model->getSystems('VALID');
					
			$document = JFactory::getDocument();
			$document->setName('systems');
			
			echo json_encode($items);
		} else {
			echo json_encode("Service not available! Webservice-Authentication has to be disabled.");
		}
	}
	
	public function setState() {
		if ($this->_authorise()) {
			$id = JRequest::getInt('id');
			$state = JRequest::getString('state');
	
			$model = $this->getModel('system');
			$result = $model->setSystemState($id, $state);
			
			$document = JFactory::getDocument();
			$document->setName('system');
		
			echo json_encode(array('id' => $id, 'state' => $state, 'result' => $result));
		} else {
			echo json_encode("Service not available! Webservice-Authentication has to be disabled.");
		}
	}
	
	private function _authorise() {
		$params = JComponentHelper::getParams('com_ropo');
		return ($params->get('webservice_authentication', '1') == '0');
	}
}