<?php

/**
 * Class WowCharsViewWowChars
 *
 * Date: 09.09.13
 * Time: 12:59
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");


class WowCharsViewAddChar extends JView{

	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$params = $app->getParams();

		$dispatcher = JDispatcher::getInstance();

		$this->form = $this->get('Form');

		if(count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br/>', $errors));
			return false;
		}

		parent::display($tpl);
	}

}
