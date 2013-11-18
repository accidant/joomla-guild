<?php

/**
 * Class modWowRaidPlannerHelper
 *
 * Date: 16.09.13
 * Time: 10:52
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class modWowRaidPlannerHelper {

	public static function getRaids($params){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select("#__raidplanner_raids.*")
		->from("#__raidplanner_raids");

		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
	}
}
