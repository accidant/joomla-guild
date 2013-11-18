<?php

/**
 * Class PunishmentModelPunishment
 *
 * Date: 09.10.13
 * Time: 11:40
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modeladmin");

class PunishmentModelPunishment extends JModelAdmin
{

	/**
	 * @param string $type
	 * @param string $prefix
	 * @param array  $config
	 *
	 * @return JTable|mixed
	 */
	public function getTable($type = 'Punishment', $prefix = 'PunishmentTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState("com_punishment.edit.punishment.data", array());
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
		$form = $this->loadForm("com_punishment.punishment", "punishment", array(
				"control" => "jform", "load_data" => $loadData
			));

		if(empty($form))
		{
			return false;
		}

		return $form;
	}
}
