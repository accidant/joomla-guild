<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.database.table");

/**
 * Class PunishmentTableViolation
 *
 * Date: 09.10.13
 * Time: 12:33
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentTableViolation extends JTable
{

	/**
	 * @param JDatabase $db
	 */
	public function __construct(&$db)
	{
		parent::__construct("#__punishment_violation", "id", $db);
	}
}
