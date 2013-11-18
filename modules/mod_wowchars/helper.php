<?php

/**
 * Class modWowCharsHelper
 *
 * Date: 09.09.13
 * Time: 15:00
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class modWowCharsHelper {


	public static function getWowChars($params){
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
				->select("*")
				->from($db->quoteName("#__wowchars"))
				->where("user_id=" . $db->quote($params->user->id));

		$db->setQuery($query);

		$results = $db->loadAssocList();

		return $results;
	}

	private static function normalize($string)
	{
		$string = str_replace(" ", "-", $string);
		return strtolower($string);
	}

	private static function loadCharacterData($realm, $charname){
		$realm = self::normalize($realm);
		$url = self::$host . "/api/wow/character/" . $realm . "/" . $charname;

		$ch = curl_init($url);

		return curl_exec($ch);
	}
}
