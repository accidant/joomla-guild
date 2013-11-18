<?php
	/**
	 * @copyright    Copyright (C) 2013 Tolrem
	 * http://www.tolrem.net
	 * Module WoW Boss - Joomla! 3
	 * @license  GNU/GPL
	**/
	 
// no direct access
defined('_JEXEC') or die('Restricted access');

class mod_wowbosspandariaHelper {
		function getData(&$params) {
			jimport('joomla.application.module.helper');		
				$titlesfont=$params->get('titlesfont');
				$contentfont=$params->get('titlesfont');
				$jquery=$params->get('jquery');
				$document =& JFactory::getDocument();

				$document->addStyleSheet("modules/mod_wowbosspandaria/tmpl/css/wowboss.css",'text/css',"screen");	
				$document->addStyleSheet("http://fonts.googleapis.com/css?family=$titlesfont",'text/css',"screen");	
				$document->addStyleSheet("http://fonts.googleapis.com/css?family=$contentfont",'text/css',"screen");	
				
				
				if ($jquery == "1"){
					$document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js");
				}
			}
		}			