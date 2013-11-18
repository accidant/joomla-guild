<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modeladmin");

/**
 * Class PunishmentModelViolation
 *
 * Date: 09.10.13
 * Time: 12:32
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentModelViolation extends JModelAdmin
{

	/**
	 * @param string $type
	 * @param string $prefix
	 * @param array  $config
	 *
	 * @return JTable|mixed
	 */
	public function getTable($type = 'Violation', $prefix = 'PunishmentTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState("com_punishment.edit.violation.data", array());
		if(empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	/**
	 * Abstract method for getting the form from the model.
	 *
	 * @param   array   $data      Data for the form.
	 * @param   boolean $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed  A JForm object on success, false on failure
	 * @since   11.1
	 */
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm("com_punishment.violation", "violation", array(
				"control" => "jform", "load_data" => $loadData
			));

		if(empty($form))
		{
			return false;
		}

		return $form;
	}
}
