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


class WowCharsViewWowChars extends JView{

	function display($tpl = null)
	{
		$this->msg = "Hello World";

		parent::display($tpl);
	}

}
