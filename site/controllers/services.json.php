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
	
	public function getsystems() {
		$model = $this->getModel('systems');
		$items = $model->getSystems('VALID');
				
		$document = JFactory::getDocument();
		$document->setName('systems');
		
		echo json_encode($items);
	}
}