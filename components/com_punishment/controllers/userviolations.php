<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controlleradmin");

/**
 * Class PunishmentControllerUserViolations
 *
 * Date: 11.11.13
 * Time: 10:47
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentControllerUserViolations extends JControllerAdmin{

	public function getModel($name = "UserViolation", $prefix="PunishmentModel")
	{
		$model = parent::getModel($name, $prefix, array("ignore_request" => true));
		return $model;
	}

}
 