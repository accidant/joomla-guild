<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

/**
 * Class PunishmentHelper
 *
 * Date: 09.10.13
 * Time: 12:22
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
abstract class PunishmentHelper
{

	/**
	 * Sets Subtabs and activates the delivered tab
	 *
	 * @param string $active
	 */
	public static function addSubTabs($active)
	{
		JSubMenuHelper::addEntry(JText::_("COM_PUNISHMENT_SUBMENU_PUNISHMENTS"), "index.php?option=com_punishment&view=punishments", $active == "punishments");
		JSubMenuHelper::addEntry(JText::_("COM_PUNISHMENT_SUBMENU_VIOLATIONS"), "index.php?option=com_punishment&view=violations", $active == "violations");
	}

}
