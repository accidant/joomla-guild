<?php

/**
 * Class WowCharsController
 *
 * Date: 09.09.13
 * Time: 12:56
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");

class WowCharsController extends JController{


	public function updateMainChar()
	{
		JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

		WowCharsHelperWowChars::swapMainChars($_POST['new_main'], $_POST['old_main']);

		echo json_encode(true);
		exit;
	}
}
