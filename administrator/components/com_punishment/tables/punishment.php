<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.database.table");

/**
 * Class PunishmentTablePunishment
 *
 * Date: 09.10.13
 * Time: 11:49
 * @author Thomas Joußen <tjoussen@databay.de>
 */
class PunishmentTablePunishment extends JTable
{

	/**
	 * @param JDatabase $db
	 */
	public function __construct(&$db)
	{
		parent::__construct("#__punishment", "id", $db);
	}
}
