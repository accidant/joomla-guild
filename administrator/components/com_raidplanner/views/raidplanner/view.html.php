<?php

/**
 * Class RaidPlannerViewRaidplanner
 *
 * Date: 25.09.13
 * Time: 15:20
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class RaidPlannerViewRaidplanner extends JView
{
	public function display($tpl = null)
	{
		$this->addToolBar();

		JFactory::getApplication()->enqueueMessage(JText::_('COM_RAIDPLANNER_NO_ACTIONS'), 'warning');

		parent::display($tpl);
	}

	private function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_RAIDPLANNER_RAIDPLANNER'));
		JToolBarHelper::preferences('com_raidplanner');
	}
}
