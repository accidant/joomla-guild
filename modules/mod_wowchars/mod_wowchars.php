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
JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

$params->user = JFactory::getUser();

$wowchars = modWowCharsHelper::getWowChars($params);
$host = WowCharsHelperWowChars::$static_host;
$spec = WowCharsHelperWowChars::$specc_image_host;

require(JModuleHelper::getLayoutPath("mod_wowchars"));

