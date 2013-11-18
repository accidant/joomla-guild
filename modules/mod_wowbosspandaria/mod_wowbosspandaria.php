<?php
	/**
	 * @copyright    Copyright (C) 2013 Tolrem
	 * http://www.tolrem.net
	 * Module WoW Boss - Pandaria Edition - Joomla! 3.x
	 * @license  GNU/GPL
	**/

// no direct access
defined('_JEXEC') or die('Restricted access');

if(!defined('DS')){
define('DS',DIRECTORY_SEPARATOR);
}

require_once (dirname(__FILE__).DS.'helper.php');


$css=$params->get('css');

$siegeoforgrimmar=$params->get('siegeoforgrimmar');
$orgrimmar=$params->get('orgrimmar');
$immerseus=$params->get('immerseus');
$fallenprotectors=$params->get('fallenprotectors');
$norushen=$params->get('norushen');
$shaofpride=$params->get('shaofpride');
$spoils=$params->get('spoils');
$thok=$params->get('thok');
$malkorok=$params->get('malkorok');
$galakras=$params->get('galakras');
$ironjuggernaut=$params->get('ironjuggernaut');
$darkshaman=$params->get('darkshaman');
$nazgrim=$params->get('nazgrim');
$paragons=$params->get('paragons');
$blackfuse=$params->get('blackfuse');
$garrosh=$params->get('garrosh');

$throneofthunder=$params->get('throneofthunder');
$tot=$params->get('tot');
$jinrokh=$params->get('jinrokh');
$horridon=$params->get('horridon');
$elders=$params->get('elders');
$tortos=$params->get('tortos');
$megaera=$params->get('megaera');
$jikun=$params->get('jikun');
$durumu=$params->get('durumu');
$primordius=$params->get('primordius');
$animus=$params->get('animus');
$ironqon=$params->get('ironqon');
$twinconsorts=$params->get('twinconsorts');
$leishen=$params->get('leishen');
$raden=$params->get('raden');

$hof=$params->get('hof');
$zorlok=$params->get('zorlok');
$tayak=$params->get('tayak');
$garalon=$params->get('garalon');
$meljarak=$params->get('meljarak');
$unsok=$params->get('unsok');
$shekzeer=$params->get('shekzeer');

$mogushan=$params->get('mogushan');
$stoneguard=$params->get('stoneguard');
$feng=$params->get('feng');
$garajal=$params->get('garajal');
$spiritkings=$params->get('spiritkings');
$elegon=$params->get('elegon');
$emperor=$params->get('emperor');

$terrace=$params->get('terrace');
$protectors=$params->get('protectors');
$tsulong=$params->get('tsulong');
$leishi=$params->get('leishi');
$shaoffear=$params->get('shaoffear');


$titlesfont=$params->get('titlesfont');
$contentfont=$params->get('contentfont');

$wrapper=$params->get('wrapper');
$wrappershadow=$params->get('wrappershadow');
$wrappercolor=$params->get('wrappercolor');

$toggleorgrimmar=$params->get('toggleorgrimmar');
$toggletot=$params->get('toggletot');
$togglehof=$params->get('togglehof');
$togglemogushan=$params->get('togglemogushan');
$toggleterrace=$params->get('toggleterrace');

$progressbar=$params->get('progressbar');
$mouseover=$params->get('mouseover');

$wowboss = mod_wowbosspandariaHelper::getData( $params );
require(JModuleHelper::getLayoutPath('mod_wowbosspandaria'));
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
?>