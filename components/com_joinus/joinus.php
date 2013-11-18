<?php
/**
 * Class ${NAME}
 *
 * Date: 09.07.13
 * Time: 14:15
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");

$controller = JController::getInstance("JoinUs");
$controller->execute(JFactory::getApplication()->input->getCmd("task", ""));
$controller->redirect();