<?php

/**
 * Class HelloWorldViewHelloWorlds
 *
 * Date: 09.07.13
 * Time: 15:17
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class HelloWorldViewHelloWorlds extends JView{

	protected $items;
	protected $pagination;
	protected $canDo;

	public function display($tpl = null){
		$items = $this->get('Items');
		$pagination = $this->get('Pagination');

		$this->canDo = HelloWorldHelper::getActions();

		$errors = $this->get('Errors');
		if(count($errors)){
			JError::raiseError(500, implode("<br />", $errors));
			return false;
		}

		$this->items =$items;
		$this->pagination = $pagination;

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		{
			JToolBarHelper::addNew('helloworld.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit'))
		{
			JToolBarHelper::editList('helloworld.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'helloworlds.delete', 'JTOOLBAR_DELETE');
		}
		if ($this->canDo->get('core.admin'))
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_helloworld');
		}
	}

	protected function setDocument(){
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION'));
	}
}
