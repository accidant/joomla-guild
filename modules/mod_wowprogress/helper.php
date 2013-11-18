<?php

/**
 * Class modWowProgressHelper
 *
 * Date: 11.09.13
 * Time: 15:59
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class modWowProgressHelper {

	public static function getProgress(){
		$url = "http://www.wowprogress.com/guild/eu/dun-morogh/Der%20schmale%20Grat/json_rank";

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
		$data = curl_exec($ch);
		curl_copy_handle($ch);

		return json_decode($data);
	}

	public static function getRankColor($rank){
		if($rank <=10){
			return "top10";
		}elseif($rank <= 100){
			return "top100";
		}elseif($rank <=2500){
			return "top2500";
		}else{
			return "";
		}
	}
}
