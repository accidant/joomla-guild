<?php
/**
 * Class ${NAME}
 *
 * Date: 11.07.13
 * Time: 13:27
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JLoader::register('JoinUsHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'joinus.php');

JoinUsHelper::addQuickMenuItem();

//import Joomla libary
jimport("joomla.application.component.controller");

$controller = JController::getInstance('JoinUs');
$controller->execute(JFactory::getApplication()->input->get('task', "", "STR"));
$controller->redirect();