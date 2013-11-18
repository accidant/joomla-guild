<?php

/**
 * Class RaidPlannerTableRaid
 *
 * Date: 13.09.13
 * Time: 15:31
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.database.table");

class RaidPlannerTableRaid extends JTable{

	public function __construct(&$db)
	{
		parent::__construct("#__raidplanner_raids", "id", $db);
	}

}
