<?php

/**
 * Class HelloWorldController
 *
 * Date: 09.07.13
 * Time: 15:14
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");

class HelloWorldController extends JController{

	public function display($cachable=false, $urlparams = false){
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'HelloWorlds'));

		parent::display($cachable, $urlparams);

		HelloWorldHelper::addSubmenu("messages");
	}

}
