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

class HelloWorldViewHelloWorld extends JView{

	protected $form;
	protected $items;
	protected $script;
	protected $canDo;

	public function display($tpl = null){

		$form = $this->get('Form');
		$items = $this->get('Items');
		$script = $this->get('Script');
		$this->canDo = HelloWorldHelper::getActions($this->items->id);

		$errors = $this->get('Errors');
		if(count($errors)){
			JError::raiseError(500, implode("<br />", $errors));
			return false;
		}

		$this->form = $form;
		$this->items =$items;
		$this->script = $script;

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;
		$input->set('hidemainmenu', true);
		$user = JFactory::getUser();
		$userId = $user->id;
		$isNew = $this->item->id == 0;
		JToolBarHelper::title($isNew ? JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_NEW')
				: JText::_('COM_HELLOWORLD_MANAGER_HELLOWORLD_EDIT'), 'helloworld');
		// Build the actions for new and existing records.
		if ($isNew)
		{
			// For new records, check the create permission.
			if ($this->canDo->get('core.create'))
			{
				JToolBarHelper::apply('helloworld.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('helloworld.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('helloworld.save2new', 'save-new.png', 'save-new_f2.png',
					'JTOOLBAR_SAVE_AND_NEW', false);
			}
			JToolBarHelper::cancel('helloworld.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($this->canDo->get('core.edit'))
			{
				// We can save the new record
				JToolBarHelper::apply('helloworld.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('helloworld.save', 'JTOOLBAR_SAVE');

				// We can save this record, but check the create permission to see
				// if we can return to make a new one.
				if ($this->canDo->get('core.create'))
				{
					JToolBarHelper::custom('helloworld.save2new', 'save-new.png', 'save-new_f2.png',
						'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}
			if ($this->canDo->get('core.create'))
			{
				JToolBarHelper::custom('helloworld.save2copy', 'save-copy.png', 'save-copy_f2.png',
					'JTOOLBAR_SAVE_AS_COPY', false);
			}
			JToolBarHelper::cancel('helloworld.cancel', 'JTOOLBAR_CLOSE');
		}
	}

	protected function setDocument(){
		$isNew = ($this->item->id == 0);
		$document = JFactory::getDocument();
		$document->setTitle($isNew? JText::_('COM_HELLOWORLD_HELLOWORLD_CREATING') : JText::_('COM_HELLOWORLD_HELLOWORLD_EDITING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_helloworld/views/helloworld/submitbutton.js");
		JText::script('COM_HELLOWORLD_HELLOWORLD_ERROR_UNACCEPTABLE');
	}

}
