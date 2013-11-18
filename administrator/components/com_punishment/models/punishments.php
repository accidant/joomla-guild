<?php

/**
 * Class PunishmentModelPunishments
 *
 * Date: 08.10.13
 * Time: 14:29
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

class PunishmentModelPunishments extends JModelList
{
	protected function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select("*")
		->from("#__punishment");

		return $query;
	}
}
