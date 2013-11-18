<?php

/**
 * Class PunishmentModelUsers
 *
 * Date: 07.11.13
 * Time: 14:35
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

class PunishmentModelUsers extends JModelList
{

	protected function getListQuery()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select("users.id, users.name,SUM(v.points) as current_points, MAX(uv.violation_date) last_violation, p.title, p.duration, up.punishment_date,
		DATE_ADD(DATE_ADD(MAX(uv.violation_date),INTERVAL ((DAYOFWEEK(MAX(uv.violation_date))>=4)*7+ 4- DAYOFWEEK(MAX(uv.violation_date))) DAY), INTERVAL 8 Week) reset_date")
			->from('#__users users')
			->leftJoin("#__punishment_user_violation uv ON uv.user_id = users.id AND uv.expired = 0")
			->leftJoin("#__punishment_violation v ON v.id = uv.violation_id")
			->leftJoin('#__punishment_user_punishment up ON up.user_id = users.id AND up.punishment_date = (
				SELECT MAX(punishment_date) FROM #__punishment_user_punishment WHERE user_id = users.id AND expired = 0
			)')
			->leftJoin('#__punishment p ON p.id = up.punishment_id')
			->where('users.id != 646')
			->group(array('users.id'))
			->order(array("name"));

		return $query;
	}
}
 