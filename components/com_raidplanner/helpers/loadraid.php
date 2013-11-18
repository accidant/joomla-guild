<?php

/**
 * Class RaidPlannerHelperLoadRaid
 *
 * Date: 20.09.13
 * Time: 16:48
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class RaidPlannerHelperLoadRaid {

	public static function loadRaid($raid_id)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
		$query->select("raid.*")
			->from("#__raidplanner_raids raid")
			->where(array("raid.id = " .$db->quote($raid_id)));
		$db->setQuery($query);

		return $db->loadAssoc();
	}

	public static function loadInvites($raid_id)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);

		$query->select("invites.*, chars.*")
			->from('#__raidplanner_invites invites')
			->innerJoin('#__wowchars chars ON chars.id = invites.char_id')
			->where(array('invites.raid_id ='.$db->quote($raid_id)));
		$db->setQuery($query);

		return $db->loadAssocList();
	}

	public static function prepareData($raid, $invites)
	{
		$data = self::prepareRaid($raid);
		$data['invites'] = self::prepareInvites($invites);

		return $data;
	}

	private static function prepareRaid($raid)
	{
		$date = new DateTime($raid['date']);
		$start = new DateTime($raid['start_time']);
		$end = new DateTime($raid['end_time']);

		$raid['date'] = $date->format("D (d.m.Y)") . " " . $start->format("H:i") . " - " . $end->format("H:i");
		$raid["raid_type"] = JText::_("COM_RAIDPLANNER_RAID_TYPE_" . strtoupper($raid['raid_type']));
		$raid["size"] = JText::_("COM_RAIDPLANNER_RAID_SIZE_" . strtoupper($raid['size']));

		return $raid;
	}

	private static function prepareInvites($invites)
	{
		JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

		foreach($invites as $key => $invite)
		{
			$invites[$key]["class"] = strtolower(WowCharsHelperWowChars::getClass($invite['class']));
			$invites[$key]["status_text"] = JText::_("COM_RAIDPLANNER_STATUS_" . strtoupper($invite['status']));
		}

		return $invites;
	}
}
