<?php

/**
 * Class WowCharsHelperWowChars
 *
 * Date: 10.09.13
 * Time: 09:08
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class WowCharsHelperWowChars {

	public static $host = "http://eu.battle.net";

	public static $static_host = "http://eu.battle.net/static-render/eu/";

	public static $specc_image_host = "http://eu.battle.net/wow/static/images/game/guide/getting-started/";

	public static function normalize($string)
	{
		$string = str_replace(" ", "-", $string);
		return strtolower($string);
	}

	public static function getClass($id){
		switch($id){
			case 1:
				return "WARRIOR";
				break;
			case 2:
				return "PALADIN";
				break;
			case 3:
				return "HUNTER";
				break;
			case 4:
				return "ROGUE";
				break;
			case 5:
				return "PRIEST";
				break;
			case 6:
				return "DEATHKNIGHT";
				break;
			case 7:
				return "SHAMAN";
				break;
			case 8:
				return "MAGE";
				break;
			case 9:
				return "WARLOCK";
				break;
			case 10:
				return "MONK";
				break;
			case 11:
				return "DRUID";
				break;
		}
	}

	public static function getFaction($id){
		switch($id){
			case 1:
			case 3:
			case 4:
			case 7:
			case 11:
			case 22:
			case 25:
				return 'ALLIANCE';
				break;
			case 2:
			case 5:
			case 6:
			case 9:
			case 8:
			case 10:
			case 26:
				return "HORDE";
				break;
		}
	}

	public static function getSpeccImage($specc){
		$img = "";
		if($specc == 'DPS'){
			$img = "icon-class-role-dealer.gif";
		}elseif($specc == 'HEALING'){
			$img = "icon-class-role-healer.gif";
		}elseif($specc == 'TANK'){
			$img = "icon-class-role-tank.gif";
		}
		return $img;
	}

	public static function swapMainChars($new)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
		$query->update('#__wowchars')
			  ->set("main = 1")
			  ->where("id = ". $db->quote($new));
		$db->setQuery($query);
		$db->execute();

		$query = $db->getQuery(true);
		$query->update('#__wowchars')
				->set("main = 0")
				->where('user_id = '.$db->quote(JFactory::getUser()->id))
				->where("id != ". $db->quote($new));
		$db->setQuery($query);
		$db->execute();
	}
}
