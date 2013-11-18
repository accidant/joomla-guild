<?php
/**
 * Class ${NAME}
 *
 * Date: 09.09.13
 * Time: 14:58
 * @author Thomas Joußen <tjoussen@databay.de>
 */

//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
require_once( dirname(__FILE__).DS."helper.php");

$params->user = JFactory::getUser();

$params->raids = modWowRaidPlannerHelper::getRaids($params);

require(JModuleHelper::getLayoutPath("mod_raidplanner"));

