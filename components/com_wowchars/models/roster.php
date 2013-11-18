<?php

/**
 * Class WowCharsModelRoster
 *
 * Date: 01.10.13
 * Time: 14:10
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

class WowCharsModelRoster extends JModelList
{
	protected function getListQuery()
	{
		$query = parent::getListQuery();

		$query->select("*")
			->from('#__wowchars')
			->order(array(
					'class','charlevel','charname'
				));

		return $query;
	}
}
