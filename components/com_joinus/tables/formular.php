<?php

/**
 * Class JoinUsTableFormular
 *
 * Date: 11.07.13
 * Time: 14:06
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.database.table");

class JoinUsTableFormular extends JTable{

	public function __construct(&$db)
	{
		parent::__construct('#__joinusformular', 'id', $db);
	}
}
