<?php

/**
 * Class HelloWorldModelHelloWorld
 *
 * Date: 09.07.13
 * Time: 14:26
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modelitem");

class HelloWorldModelHelloWorld extends JModelItem{

	/**
	 * @var object $item
	 */
	protected $item;

	public function getTable($type = "HelloWorld", $prefix = "HelloWorldTable", $config = array()){
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getItem()
	{
		if (!isset($this->item))
		{
			$id = $this->getState('message.id');
			$this->_db->setQuery($this->_db->getQuery(true)
								 ->from('#__helloworld as h')
								 ->leftJoin('#__categories as c ON h.catid=c.id')
								 ->select('h.greeting, h.params, c.title as category')
								 ->where('h.id=' . (int)$id));
			if (!$this->item = $this->_db->loadObject())
			{
				$this->setError($this->_db->getError());
			}
			else
			{
				// Load the JSON string
				$params = new JRegistry;
				// loadJSON is @deprecated    12.1  Use loadString passing JSON as the format instead.
				$params->loadString($this->item->params, 'JSON');
				$this->item->params = $params;

				// Merge global params with item params
				$params = clone $this->getState('params');
				$params->merge($this->item->params);
				$this->item->params = $params;
			}
		}
		var_dump($this->item);

		return $this->item;
	}

	protected function populateState(){
		$app = JFactory::getApplication();
		$input = JFactory::getApplication()->input;
		$id = $input->getInt('id', 'id');
		$this->setState('message.id', $id);

		$params = $app->getParams();
		$this->setState('params', $params);
		parent::populateState();
	}
}
