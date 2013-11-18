<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modeladmin");

/**
 * Class PunishmentModelUserViolation
 *
 * Date: 11.11.13
 * Time: 10:41
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentModelUserViolation extends JModelAdmin
{

	public function getTable($type="UserViolation", $prefix="PunishmentTable", $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadDate= true)
	{
		$form = $this->loadForm("com_punishment.userviolation", "userviolation", array(
				"control" => "jform", "load_data" => $loadDate
			));

		return (!empty($form))? $form: false;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState("com_punishment.edit.userviolation.data", array());
		if(empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	public function save($data)
	{
		$data['violation_date'] = new \DateTime();
		$data['violation_date'] = $data['violation_date']->format('Y-m-d');

		parent::save($data);
		return true;
	}
}
 