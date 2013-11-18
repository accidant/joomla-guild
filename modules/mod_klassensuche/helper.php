<?php
/**
 * @version SVN: $Id: mod_#module#.php 96 2012-09-21 Cmstyles.de $
 * @package    Klassensuche
 * @subpackage Base
 * @copyright    Copyright (C) 2012 Cmstyles.de
 * http://www.cmstyles.de
 * Module Cmprogress - Joomla! 2.5
 * @license  GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class mod_klassensuche_searchHelper{
  
  function getModuleId($foo,$userfoo){
    if($userfoo){
      $bar = $userfoo;
    }else{
      $bar = $foo;
    }
		return ($bar);
	}
	 
  function getClass($class){
    if($class){
      $status = "mod_klassensuche_active";
    }else{
      $status = "";
    }
		return ($status);
	}
	
	function getClassInfo($classInfo){
    if($classInfo){      
      $info = "<span>".$classInfo."</span>";
    }else{
      $info = "";
    }
		return ($info);
	}
	
	function domainCheck(){
    $host = $_SERVER['HTTP_HOST'];
    $check = true;
    if(strcasecmp ($host,"cmstyles.de")==0 || strcasecmp ($host,"www.gcmstyles.de")==0 || strcasecmp ($host,"localhost")==0){
      $check = false;
    }
		return ($check);
	}
}