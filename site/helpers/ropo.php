<?php
// No direct access to this file
defined('_JEXEC') or die;

/**
 * Ropo component helper.
 */
abstract class RopoHelper
{
	
	/**         
	  * Get the actions         
	  */        
	public static function getActions($systemId = 0)        
	{                       
		jimport('joomla.access.access');                
		$user   = JFactory::getUser();                
		$result = new JObject;                 
		if (empty($messageId)) {                        
			$assetName = 'com_ropo';                
		} else {                        
			$assetName = 'com_ropo.system.'.(int) $systemId;                
		}                 
		$actions = JAccess::getActions('com_ropo', 'component');                 
		foreach ($actions as $action) {                        
			$result->set($action->name, $user->authorise($action->name, $assetName));                
		}                 
		return $result;        
	}

}