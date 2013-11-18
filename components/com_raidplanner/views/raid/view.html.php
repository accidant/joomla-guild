<?php

/**
 * Class RaidPlannerViewRaid
 *
 * Date: 13.09.13
 * Time: 14:41
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class RaidPlannerViewRaid extends JView{

	public function display($tpl = null){
		$this->form = $this->get("Form");
		$this->item = $this->get("Item");

		parent::display($tpl);

		JHtml::stylesheet('com_raidplanner/site.stylesheet.css', array(), true);
	}



}
