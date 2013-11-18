<?php
/**
 * Class ${NAME}
 *
 * Date: 13.09.13
 * Time: 09:09
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");

$controller = JController::getInstance("Punishment");

$input = JFactory::getApplication()->input;

$controller->execute($input->getCmd("task", ""));

$controller->redirect();