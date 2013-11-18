<?php

/**
 * Class HelloWorldHelper
 *
 * Date: 10.07.13
 * Time: 09:34
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

abstract class HelloWorldHelper {

	public static function addSubmenu($submenu){
		JSubMenuHelper::addEntry(JText::_('COM_HELLOWORLD_SUBMENU_MESSAGES'), 'index.php?option=com_helloworld', $submenu == 'messages');
		JSubMenuHelper::addEntry(JText::_('COM_HELLOWORLD_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_helloworld', $submenu == 'categories');

		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-helloworld', '{background-image: url(../media/com_helloworld/images/icon_big.png);}');

		if($submenu == 'categories'){
			$document->setTitle((JText::_('COM_HELLOWORLD_ADMINISTRATION_CATEGORIES')));
		}
	}

	public static function getActions($messageId = 0){
		jimport('joomla.access.access');
		$user = JFactory::getUser();
		$result = new JObject();

		if(empty($messageId)){
			$assetName = 'com_helloworld';
		}
		else{
			$assetName = "com_helloworld.message." . (int)$messageId;
		}

		$actions = JAccess::getActions('com_helloworld', 'component');

		foreach($actions as $action){
			$result->set($action->name, $user->authorise($action->name, $assetName));
		}

		return $result;
	}

}
