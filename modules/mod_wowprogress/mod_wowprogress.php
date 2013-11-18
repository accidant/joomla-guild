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

$params->ranking = modWowProgressHelper::getProgress();

$world = modWowProgressHelper::getRankColor($params->ranking->world_rank);
$west = modWowProgressHelper::getRankColor($params->ranking->area_rank);
$realm = modWowProgressHelper::getRankColor($params->ranking->realm_rank);

require(JModuleHelper::getLayoutPath("mod_wowprogress"));

