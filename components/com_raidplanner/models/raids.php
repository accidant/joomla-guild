<?php

/**
 * Class RaidPlannerModelRaids
 *
 * Date: 13.09.13
 * Time: 13:31
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

class RaidPlannerModelRaids extends JModelList{

	protected function getListQuery()
	{
		$current_date = new DateTime("-1 Wednesday");

		$user = JFactory::getUser();

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select("raids.*, invites.status AS status, (
				SELECT COUNT(invites2.char_id)
				FROM #__raidplanner_invites invites2
				WHERE invites2.raid_id = raids.id
			) AS invited, (
				SELECT COUNT(invites3.char_id)
				FROM #__raidplanner_invites invites3
				WHERE invites3.raid_id = raids.id
				AND (status = 'accepted' OR status = 'confirmed')
			) AS accepted")
		->from("#__raidplanner_raids raids")
		->innerJoin('#__raidplanner_invites invites ON invites.raid_id = raids.id')
		->innerJoin('#__wowchars chars ON chars.id = invites.char_id')
		->where("chars.user_id = " . $db->quote($user->id))
		->where("chars.main = " . $db->quote(1))
		->where("raids.date >= " . $db->quote($current_date->format('Y-m-d')))
		->group("invites.raid_id")
		->order(array("raids.date"));

		return $query;
	}
}
