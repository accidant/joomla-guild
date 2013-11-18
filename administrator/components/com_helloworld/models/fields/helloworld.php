<?php

/**
 * Class JFormFieldHelloWorld
 *
 * Date: 09.07.13
 * Time: 14:47
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.form.helper");
JFormHelper::loadFieldClass("list");

class JFormFieldHelloWorld extends JFormFieldList{

	/**
	 * @var string
	 */
	protected $type = "HelloWorld";

	/**
	 * @return array
	 */
	protected function getOptions(){
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('#__helloworld.id as id, greeting, #__categories.title as category, catid')
				->from('#__helloworld')
				->leftJoin('#__categories on catid=#__categories.id');

		$db->setQuery($query);
		$messages = $db->loadObjectList();
		$options = array();
		foreach($messages as $message){
			$options[] = JHtml::_('select.option', $message->id, $message->greeting .
				($message->catid ? ' (' . $message->category . ')' : ""));
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}

}
