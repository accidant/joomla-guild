<?php

/**
 * Class PunishmentControllerPunishments
 *
 * Date: 09.10.13
 * Time: 11:29
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controlleradmin");

class PunishmentControllerPunishments extends JControllerAdmin
{
	public function getModel($name = 'Punishment', $prefix = 'PunishmentModel')
	{
		return parent::getModel($name, $prefix, array("ignore_request" => true));
	}
}
