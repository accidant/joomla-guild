<?php
/**
 * FILE punishment.php
 *
 * Date: 08.10.13
 * Time: 14:03
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");

// require helper file
JLoader::register('PunishmentHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'punishment.php');

$controller = JController::getInstance("Punishment");
$jinput = JFactory::getApplication()->input;

$controller->execute($jinput->get("task", "", "STR"));

$controller->redirect();