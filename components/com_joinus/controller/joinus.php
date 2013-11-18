<?php

/**
 * Class JoinUsControllerJoinUs
 *
 * Date: 05.11.13
 * Time: 13:16
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controllerform");

class JoinUsControllerJoinUs extends JControllerForm {

	public function submit()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		var_dump($_POST);exit;
	}

}
