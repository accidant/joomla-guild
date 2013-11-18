<?php

/**
 * Class RaidPlannerController
 *
 * Date: 13.09.13
 * Time: 09:06
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controller");
class RaidPlannerController extends JController{

	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false, $urlparams = false)
	{
		// set default view if not set
		$input = JFactory::getApplication()->input;
		$input->set('view', $input->getCmd('view', 'Raidplanner'));

		// call parent behavior
		parent::display($cachable);
	}
}
