<?php

/**
 * Class WowCharsControllerRoster
 *
 * Date: 01.10.13
 * Time: 14:09
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controlleradmin");

class WowCharsControllerRoster extends JControllerAdmin
{
	public function getModel($name ="Roster", $prefix="WowCharsModel"){
		$model = parent::getModel($name, $prefix, array("ignore_request" => true));
		return $model;
	}
}
