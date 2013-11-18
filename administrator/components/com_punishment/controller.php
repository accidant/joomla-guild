<?php

/**
 * Class PunishmentController
 *
 * Date: 08.10.13
 * Time: 14:03
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");

class PunishmentController extends JController{

	public function display($cachable = false, $urlparams = false)
	{
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd("view", "punishments"));

		PunishmentHelper::addSubTabs($input->get("view"));

		parent::display($cachable, $urlparams);
	}
}
