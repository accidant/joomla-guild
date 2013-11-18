<?php

/**
 * Class JoinUsModelFormular
 *
 * Date: 11.07.13
 * Time: 13:43
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modelform");

class JoinUsModelFormular extends JModelForm{

	public function getTable($name = '', $prefix = 'Table', $options = array())
	{
		return JTable::getInstance($name, $prefix, $options);
	}

	/**
	 * Abstract method for getting the form from the model.
	 *
	 * @param   array   $data      Data for the form.
	 * @param   boolean $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed  A JForm object on success, false on failure
	 * @since   11.1
	 */
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm('com_joinus.formular', 'formular', array(
				'controll' => 'jform',
				'load_data' => $loadData
		));

		if(empty($form)){
			return false;
		}
		return $form;
	}

	protected function loadFormData(){

	}
}
