<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

/**
 * Class PunishmentViewViolations
 *
 * Date: 09.10.13
 * Time: 12:35
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentViewViolations extends JView
{
	public function display($tpl = null)
	{
		$this->items = $this->get("Items");
		$this->pagination = $this->get("Pagination");

		if(count($errors = $this->get("Errors")))
		{
			throw new Exception(implode("<br />", $errors), 500);
		}

		$this->addToolBar($this->pagination->total);

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar($total=null)
	{
		JToolBarHelper::title(
			JText::_("COM_PUNISHMENT_MANAGER_VIOLATION").
			($total?' <span style="font-size: 0.5em; vertical-align: middle;">('.$total.')</span>':'')
		);

		JToolBarHelper::addNew("violation.add");
		JToolBarHelper::editList("violation.edit");
		JToolBarHelper::deleteList("", "violations.delete");
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_punishment');
	}



	protected function setDocument()
	{
		JFactory::getDocument()->setTitle(JText::_("COM_PUNISHMENT_VIOLATION_ADMINISTRATION"));
	}
}
