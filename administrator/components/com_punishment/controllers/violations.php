<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controlleradmin");

/**
 * Class PunishmentControllerViolations
 *
 * Date: 09.10.13
 * Time: 12:29
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentControllerViolations extends JControllerAdmin
{
	public function getModel($name = 'Violation', $prefix = 'PunishmentModel')
	{
		return parent::getModel($name, $prefix, array("ignore_request" => true));
	}
}
