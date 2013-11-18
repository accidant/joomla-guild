<?php

/**
 * Class HelloWorldModelHelloWorld
 *
 * Date: 09.07.13
 * Time: 16:06
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modeladmin");

class HelloWorldModelHelloWorld extends JModelAdmin{

	public function getTable($type="HelloWorld", $prefix = "HelloWorldTable", $config = array()){
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData= true){
		$form = $this->loadForm('com_helloworld.helloworld', 'helloworld', array(
				'control' => 'jform', 'load_data' => $loadData
			));

		if(empty($form)){
			return false;
		}
		return $form;
	}

	public function getScript(){
		return 'administrator/components/com_helloworld/models/forms/helloworld.js';
	}

	protected function loadFormData(){
		$data = JFactory::getApplication()->getUserState("com_helloworld.edit.helloworld.data", array());
		if(empty($data)){
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Method to check if it's OK to delete a message. Overwrites JModelAdmin::canDelete
	 */
	protected function canDelete($record)
	{
		if( !empty( $record->id ) ){
			$user = JFactory::getUser();
			return $user->authorise( "core.delete", "com_helloworld.message." . $record->id );
		}
	}
}
