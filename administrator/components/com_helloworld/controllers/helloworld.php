<?php

/**
 * Class HelloWorldControllerHelloWorld
 *
 * Date: 09.07.13
 * Time: 15:56
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controllerform");

class HelloWorldControllerHelloWorld extends JControllerForm{

	/**
	 * Implement to allowAdd or not
	 *
	 * Not used at this time (but you can look at how other components use it....)
	 * Overwrites: JControllerForm::allowAdd
	 *
	 * @param array $data
	 * @return bool
	 */
	protected function allowAdd($data = array())
	{
		return parent::allowAdd($data);
	}

	/**
	 * Implement to allow edit or not
	 * Overwrites: JControllerForm::allowEdit
	 *
	 * @param array $data
	 * @param string $key
	 * @return bool
	 */
	protected function allowEdit($data = array(), $key = 'id')
	{
		$id = isset( $data[ $key ] ) ? $data[ $key ] : 0;
		if( !empty( $id ) ){
			$user = JFactory::getUser();
			return $user->authorise( "core.edit", "com_helloworld.message." . $id );
		}
	}
}
