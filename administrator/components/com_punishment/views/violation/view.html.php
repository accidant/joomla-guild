<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

/**
 * Class PunishmentViewViolation
 *
 * Date: 09.10.13
 * Time: 12:36
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentViewViolation extends JView
{

	public function display($tpl = null)
	{
		$this->form = $this->get("Form");
		$this->item = $this->get("Item");

		if(count($errors = $this->get("Errors")))
		{
			throw new Exception(implode("<br>", $errors), 500);
		}

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		JFactory::getApplication()->input->set("hidemainmenu", true);

		$isNew = ($this->item->id == 0);
		JToolBarHelper::title(
			$isNew ? JText::_("COM_PUNISHMENT_MANAGER_VIOLATION_NEW") : JText::_("COM_PUNISHMENT_MANAGER_VIOLATION_EDIT")
		);
		JToolBarHelper::save("violation.save");
		JToolBarHelper::cancel("violation.cancel",
			$isNew ? JText::_("JTOOLBAR_CANCEL") : JText::_("JTOOLBAR_CLOSE")
		);
	}

	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument()
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_PUNISHMENT_VIOLATION_CREATING')
				: JText::_('COM_PUNISHMENT_VIOLATION_EDITING'));
	}
}
