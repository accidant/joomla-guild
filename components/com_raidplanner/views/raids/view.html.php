<?php

/**
 * Class RaidPlannerViewRaids
 *
 * Date: 13.09.13
 * Time: 13:27
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class RaidPlannerViewRaids extends JView{

	/**
	 * @var JObject
	 */
	protected $canDo;

	public function __construct($config = array())
	{
		parent::__construct($config); // TODO: Change the autogenerated stub

		$this->loadHelper("raidplanner");

		$this->canDo = RaidPlannerHelper::getActions();
	}


	function display($tpl = null)
	{
		$this->items = $this->get("Items");
		$this->pagination = $this->get("Pagination");

		JHtml::script("com_raidplanner/jquery.raidplanner.js", false, true, false, false);
		JHtml::stylesheet('com_raidplanner/site.stylesheet.css', array(), true);

		parent::display($tpl);
	}
}