<?php

/**
 * Class HelloWorldViewHelloWorld
 *
 * Date: 09.07.13
 * Time: 14:22
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class HelloWorldViewHelloWorld extends JView{

	public function display($tpl = null){
		$this->item = $this->get('Item');

		$errors = $this->get('Errors');
		if(count($errors)){
			JLog::add(implode('<br/>', $errors), JLog::WARNING, 'jerror');
			return false;
		}

		parent::display($tpl);
	}
}
