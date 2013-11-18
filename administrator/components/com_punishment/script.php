<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

/**
 * Class com_punishmentInstallerScript
 *
 * Date: 09.10.13
 * Time: 12:12
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class com_punishmentInstallerScript
{
	/**
	 * method to install the component
	 */
	function install($parent)
	{
		// $parent is the class calling this method
		$parent->getParent()->setRedirectURL('index.php?option=com_punishment');
	}

	/**
	 * method to uninstall the component
	 */
	function uninstall($parent)
	{
		// $parent is the class calling this method
		echo '<p>' . JText::_('COM_PUNISHMENT_UNINSTALL_TEXT') . '</p>';
	}

	/**
	 * method to update the component
	 */
	function update($parent)
	{
		// $parent is the class calling this method
		echo '<p>' . JText::sprintf('COM_PUNISHMENT_UPDATE_TEXT', $parent->get('manifest')->version) . '</p>';
	}

	/**
	 * method to run before an install/update/uninstall method
	 */
	function preflight($type, $parent)
	{
		// $parent is the class calling this method
		// $type is the type of change (install, update or discover_install)
		echo '<p>' . JText::_('COM_PUNISHMENT_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	/**
	 * method to run after an install/update/uninstall method
	 */
	function postflight($type, $parent)
	{
		// $parent is the class calling this method
		// $type is the type of change (install, update or discover_install)
		echo '<p>' . JText::_('COM_PUNISHMENT_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
