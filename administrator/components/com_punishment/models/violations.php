<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

/**
 * Class PunishmentModelViolations
 *
 * Date: 09.10.13
 * Time: 12:30
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentModelViolations extends JModelList
{

	protected function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select("*")
			->from('#__punishment_violation');

		return $query;
	}
}
