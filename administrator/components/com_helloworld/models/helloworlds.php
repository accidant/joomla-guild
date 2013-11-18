<?php

/**
 * Class HelloWorldModelHelloWorlds
 *
 * Date: 09.07.13
 * Time: 15:30
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modellist");

class HelloWorldModelHelloWorlds extends JModelList{

	protected function _getListQuery(){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id,greeting')->from('#__helloworld');
		return $query;
	}

}
