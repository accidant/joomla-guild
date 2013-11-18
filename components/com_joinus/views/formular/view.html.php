<?php

/**
 * Class JoinUsViewFormular
 *
 * Date: 11.07.13
 * Time: 11:58
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class JoinUsViewFormular extends JView{

	protected $form;
	protected $item;

	public function display($tpl = null)
	{
		$this->item = $this->get('Item');
		$this->form = $this->get('Form');

		$errors = $this->get("Errors");
		if(count($errors)){
			JLog::add(implode("<br />", $errors), JLog::WARNING, 'jerror');
			return false;
		}
		
		return parent::display($tpl);
	}
}
