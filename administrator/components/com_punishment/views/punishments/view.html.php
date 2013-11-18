<?php

/**
 * Class PunishmentViewPunishments
 *
 * Date: 08.10.13
 * Time: 14:08
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");


class PunishmentViewPunishments extends JView
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
			JText::_("COM_PUNISHMENT_MANAGER_PUNISHMENT").
			($total?' <span style="font-size: 0.5em; vertical-align: middle;">('.$total.')</span>':'')
		);

		JToolBarHelper::addNew("punishment.add");
		JToolBarHelper::editList("punishment.edit");
		JToolBarHelper::deleteList("", "punishments.delete");
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_punishment');
	}



	protected function setDocument()
	{
		JFactory::getDocument()->setTitle(JText::_("COM_PUNISHMENT_ADMINISTRATION"));
	}
}
