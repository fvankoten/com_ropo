<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * Script file of ROPO component
 */
class com_ropoInstallerScript
{
	private $_packages;
	
	/**
	 * Constructor
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	public function __construct(JAdapterInstance $adapter)
	{
		// Get the path to the package to install
		$p_dir_user = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ropo'.DS.'extensions'.DS.'plugins'.DS.'user'.DS;
		$p_dir_user = JPath::clean( $p_dir_user );
		
		$p_dir_auth = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ropo'.DS.'extensions'.DS.'plugins'.DS.'authentication'.DS;
		$p_dir_auth = JPath::clean( $p_dir_auth );
		
		$p_dir_dompdf = JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ropo'.DS.'extensions'.DS.'libraries'.DS.'dompdf'.DS;
		$p_dir_dompdf = JPath::clean( $p_dir_dompdf );

		$this->_packages = array(
			"ropoprofile" => array(
				"packagefile" => null,
				"extractdir" => null,
				"dir" => $p_dir_user,
				"type" => "user"
			),
			"email" => array(
				"packagefile" => null,
				"extractdir" => null,
				"dir" => $p_dir_auth,
				"type" => "authentication"
			),
			"dompdf" => array(
					"packagefile" => null,
					"extractdir" => null,
					"dir" => $p_dir_dompdf,
					"type" => "library"
			)
		);
		
	}

	/**
	 * Called on installation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function install(JAdapterInstance $adapter)
	{
		echo '<p>' . JText::_('COM_ROPO_INSTALL_TEXT') . '</p>';
		return true;
	}

	/**
	 * Called on uninstallation
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 */
	public function uninstall(JAdapterInstance $adapter)
	{
		echo '<p>' . JText::_('COM_ROPO_UNINSTALL_TEXT') . '</p>';
	}

	/**
	 * Called on update
	 *
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function update(JAdapterInstance $adapter)
	{
		echo '<p>' . JText::sprintf('COM_ROPO_UPDATE_TEXT', $adapter->get('manifest')->version) . '</p>';
		return true;
	}

	/**
	 * Called before any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function preflight($route, JAdapterInstance $adapter)
	{
		return true;
	}

	/**
	 * Called after any type of action
	 *
	 * @param   string  $route  Which action is happening (install|uninstall|discover_install)
	 * @param   JAdapterInstance  $adapter  The object responsible for running this script
	 *
	 * @return  boolean  True on success
	 */
	public function postflight($route, JAdapterInstance $adapter)
	{
		$result = true;
		if (($route == 'install') || ($route == 'update')) {
			$installresult = $this->installPlugins();
			
			if (($installresult & 0x01) == 0) {
				JError::raiseWarning(
					100,
					JText::_(
						'com_ropo profile plugin not installed. '
						. 'Please install it manually from the following folder'
						) . ': '.$this->_packages['ropoprofile']['dir']
				);
			} else {
				echo "<p>" . JText::_('COM_ROPO_INSTALL_PLUGIN_ROPOPROFILE_SUCCESS') . "</p>";
				JFolder::delete($this->_packages['ropoprofile']['dir']);
			}
			
			if (($installresult & 0x02) == 0) {
				JError::raiseWarning(
				100,
				JText::_(
				'com_ropo email plugin not installed. '
						. 'Please install it manually from the following folder'
								) . ': '.$this->_packages['email']['dir']
				);
			} else {
				echo "<p>" . JText::_('COM_ROPO_INSTALL_PLUGIN_EMAIL_SUCCESS') . "</p>";
				JFolder::delete($this->_packages['email']['dir']);
			}
			
			if (($installresult & 0x04) == 0) {
				JError::raiseWarning(
				100,
				JText::_(
				'dompdf library not installed. '
						. 'Please install it manually from the following folder'
								) . ': '.$this->_packages['dompdf']['dir']
				);
			} else {
				echo "<p>" . JText::_('COM_ROPO_INSTALL_LIBRARY_DOMPDF_SUCCESS') . "</p>";
				JFolder::delete($this->_packages['dompdf']['dir']);
			}
			
			//if ($route == 'install') {
				echo "<p>" . JText::_('COM_ROPO_INSTALL_NOTIFICATIONS') . "</p>";
			//}
			
			$result &= ($installresult > 0); 
		}
		return $result;
	}

	/**
	 * Installs plugins contained in $packages
	 * @param array $packages Install-instructions for plugins
	 * @return int 0 on error, >1 otherwise
	 */
	private function installPlugins() {
		$packages = $this->_packages;
		$mainframe =& JFactory::getApplication();

		if (!is_array($packages)) {
			return false;
		}

		$result = 0;
		$cnt = 0;
		foreach($packages as $package) {
			// Get an installer instance
			$installer = new JInstaller();
			$installer->setOverwrite(true);

			// Install the package
			if (!$installer->install($package['dir'])) {
				// There was an error installing the package
				$success = 0;
			} else {
				// Package installed sucessfully
				$success = 1;
			}

			// Cleanup the install files
			if (!is_file($package['packagefile'])) {
				$config =& JFactory::getConfig();
				$package['packagefile'] = $config->getValue('config.tmp_path').DS.$package['packagefile'];
			}

			JInstallerHelper::cleanupInstall($package['packagefile'], $package['extractdir']);

			$result |= ($success << $cnt++);
		}

		return $result;
	}
}