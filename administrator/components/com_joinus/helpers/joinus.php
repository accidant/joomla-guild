<?php

/**
 * Class JoinUsHelper
 *
 * Date: 11.07.13
 * Time: 16:15
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");


abstract class JoinUsHelper {

	public static function addQuickMenuItem(){
		$app = JFactory::getApplication();
		$app->registerEvent('onGetIcons', function(){
			return array(
				'link' => JRoute::_('index.php?option=com_joinus'),
				'image' => 'header/icon-48-user-profile.png',
				'text' => JText::_('COM_JOINUS'),
				'access' => true
			);
		});
	}

}
