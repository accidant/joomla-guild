<?php
/**
 * Class ${NAME}
 *
 * Date: 09.07.13
 * Time: 15:02
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JLoader::register('HelloWorldHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'helloworld.php');

// Access check: is this user allowed to access the backend of this component?
if (!JFactory::getUser()->authorise('core.manage', 'com_helloworld'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}



$document = JFactory::getDocument();
$document->addStyleDeclaration('.icon-48-helloworld {background-image: url(../media/com_helloworld/images/icon_big.png)}');

//import Joomla libary
jimport("joomla.application.component.controller");

$controller = JController::getInstance("HelloWorld");
$controller->execute(JFactory::getApplication()->input->get("task", "", "STR"));
$controller->redirect();