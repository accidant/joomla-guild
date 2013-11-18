<?php

/**
 * Class WowCharsViewRoster
 *
 * Date: 01.10.13
 * Time: 14:23
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.view");

class WowCharsViewRoster extends JView
{

	public function display($tpl = null)
	{
		$items = $this->get("Items");

		$this->items = $this->prepareItems($items);

		parent::display($tpl);
	}

	public function prepareItems($items)
	{
		$prepared = array();

		foreach($items as $item)
		{
			if(!array_key_exists($item->class, $prepared))
			{
				$prepared[$item->class] = array();
			}
			$prepared[$item->class][] = $item;
		}

		return $prepared;
	}
}
