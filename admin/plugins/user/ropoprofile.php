<?php

defined('JPATH_BASE') or die;

/**
 * ROPO profile plugin.
 *
 * @package           Joomla.Plugins
 * @subpackage        user.profile
 * @version           1.6
 */
class plgUserRopoprofile extends JPlugin
{
	/**
	 * @param       string  The context for the data
	 * @param       int             The user id
	 * @param       object
	 * @return      boolean
	 * @since       1.6
	 */
	function onContentPrepareData($context, $data)
	{
		// Check we are manipulating a valid form.
		if (!in_array($context, array('com_users.profile','com_users.registration','com_users.user','com_admin.profile'))){
			return true;
		}

		$userId = isset($data->id) ? $data->id : 0;

		// Load the profile data from the database.
		$db = &JFactory::getDbo();
		$db->setQuery(
				'SELECT profile_key, profile_value FROM #__user_profiles' .
				' WHERE user_id = '.(int) $userId .
				' AND profile_key LIKE \'ropoprofile.%\'' .
				' ORDER BY ordering'
		);
		$results = $db->loadRowList();

		// Check for a database error.
		if ($db->getErrorNum()) {
			$this->_subject->setError($db->getErrorMsg());
			return false;
		}

		// Merge the profile data.
		$data->ropoprofile = array();
		foreach ($results as $v) {
			$k = str_replace('ropoprofile.', '', $v[0]);
			$data->ropoprofile[$k] = json_decode($v[1], true);
		}

		return true;
	}

	/**
	 * @param       JForm   The form to be altered.
	 * @param       array   The associated data for the form.
	 * @return      boolean
	 * @since       1.6
	 */
	function onContentPrepareForm($form, $data)
	{
		// Load user_profile plugin language
		$lang = JFactory::getLanguage();
		$lang->load('plg_user_ropoprofile', JPATH_ADMINISTRATOR);

		$fields = array(
				'address1',
				'postalcode',
				'city',
				'regno',
				'telephone',
				'telefax',
				'website'
		);

		if (!($form instanceof JForm)) {
			$this->_subject->setError('JERROR_NOT_A_FORM');
			return false;
		}
		// Check we are manipulating a valid form.
		if (!in_array($form->getName(), array('com_users.profile', 'com_users.registration','com_users.user','com_admin.profile'))) {
			return true;
		}

		foreach ($fields as $field)
		{
			if ($form->getName()=='com_users.profile')
			{
				// Add the profile fields to the form.
				JForm::addFormPath(dirname(__FILE__).'/profiles');
				$form->loadFile('profile', false);

				// Toggle whether the fields are required.
				if ($this->params->get('profile-require-' . $field, 1) > 0) {
					$form->setFieldAttribute($field, 'required', $this->params->get('profile-require-' . $field) == 2, 'ropoprofile');
				} else {
					$form->removeField($field, 'ropoprofile');
				}
			}

			//In this example, we treat the frontend registration and the back end user create or edit as the same.
			elseif ($form->getName()=='com_users.registration' || $form->getName()=='com_users.user' )
			{
				// Add the registration fields to the form.
				JForm::addFormPath(dirname(__FILE__).'/profiles');
				$form->loadFile('profile', false);

				// Toggle whether the fields are required.
				if ($this->params->get('register-require-' . $field, 1) > 0) {
					$form->setFieldAttribute($field, 'required', $this->params->get('register-require-' .  $field) == 2, 'ropoprofile');
				} else {
					$form->removeField($field, 'ropoprofile');
				}
			}
		}
	}

	function onUserAfterSave($data, $isNew, $result, $error)
	{
		$userId = JArrayHelper::getValue($data, 'id', 0, 'int');

		if ($userId && $result && isset($data['ropoprofile']) && (count($data['ropoprofile'])))
		{
			try
			{
				$db = &JFactory::getDbo();
				$db->setQuery('DELETE FROM #__user_profiles WHERE user_id = '.$userId.' AND profile_key LIKE \'ropoprofile.%\'');
				if (!$db->query()) {
					throw new Exception($db->getErrorMsg());
				}

				$tuples = array();
				$order  = 1;
				foreach ($data['ropoprofile'] as $k => $v) {
					$tuples[] = '('.$userId.', '.$db->quote('ropoprofile.'.$k).', '.$db->quote(json_encode($v)).', '.$order++.')';
				}

				$db->setQuery('INSERT INTO #__user_profiles VALUES '.implode(', ', $tuples));
				if (!$db->query()) {
					throw new Exception($db->getErrorMsg());
				}
			}
			catch (JException $e) {
				$this->_subject->setError($e->getMessage());
				return false;
			}
		}

		return true;
	}

	/**
	 * Remove all user profile information for the given user ID
	 *
	 * Method is called after user data is deleted from the database
	 *
	 * @param       array           $user           Holds the user data
	 * @param       boolean         $success        True if user was succesfully stored in the database
	 * @param       string          $msg            Message
	 */
	function onUserAfterDelete($user, $success, $msg)
	{
		if (!$success) {
			return false;
		}

		$userId = JArrayHelper::getValue($user, 'id', 0, 'int');

		if ($userId)
		{
			try
			{
				$db = JFactory::getDbo();
				$db->setQuery(
						'DELETE FROM #__user_profiles WHERE user_id = '.$userId .
						" AND profile_key LIKE 'ropoprofile.%'"
				);

				if (!$db->query()) {
					throw new Exception($db->getErrorMsg());
				}
			}
			catch (JException $e)
			{
				$this->_subject->setError($e->getMessage());
				return false;
			}
		}

		return true;
	}


}
?>