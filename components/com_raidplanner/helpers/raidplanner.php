<?php

/**
 * Class RaidPlannerHelper
 *
 * Date: 25.09.13
 * Time: 15:44
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
abstract class RaidPlannerHelper {

	public static function getActions()
	{
		$result = new JObject();
		$user = JFactory::getUser();

		$actions = JAccess::getActionsFromFile(JPATH_ADMINISTRATOR . '/components/com_raidplanner/access.xml');

		foreach($actions as $action)
		{
			$result->set($action->name, $user->authorise($action->name, "com_raidplanner"));
		}

		return $result;
	}
}
