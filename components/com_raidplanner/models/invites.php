<?php

/**
 * Class RaidPlannerModelInvites
 *
 * Date: 25.09.13
 * Time: 13:17
 * @author Thomas Joußen <tjoussen@databay.de>
 */

//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

class RaidPlannerModelInvites extends JModelList
{

	protected function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query
			->select("invites.*, chars.*")
			->from('#__raidplanner_invites invites')
			->innerJoin('#__wowchars chars ON chars.id = invites.char_id')
			->where(array(
				'invites.raid_id ='.$db->quote($this->getState("raid.id"))
			))
			->order(array('chars.charname'));

		return $query;
	}
}
