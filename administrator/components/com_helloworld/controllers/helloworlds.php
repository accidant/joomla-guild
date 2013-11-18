<?php

/**
 * Class HelloWorldControllerHelloWorlds
 *
 * Date: 09.07.13
 * Time: 15:54
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controlleradmin");

class HelloWorldControllerHelloWorlds extends JControllerAdmin{

	public function getModel($name = "HelloWorld", $prefix){
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}

}
