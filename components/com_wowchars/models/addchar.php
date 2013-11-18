<?php

/**
 * Class WowCharsModelAddChar
 *
 * Date: 09.09.13
 * Time: 16:41
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modelform");
jimport("joomla.application.component.modelitem");

jimport("joomla.event.dispatcher");

class WowCharsModelAddChar extends JModelForm{

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
		$form = $this->loadForm("com_wowchars.addchar", "addchar", array("controller" => "jform", "load_data" => true));

		if(empty($form)){
			return false;
		}

		return $form;
	}

	public function addItem($data)
	{
		JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );
		WowCharsHelperWowChars::swapMainChars(-1);

		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->clear();
		$query->insert("#__wowchars")
				->columns(array(
					"realm",
					"charname",
					"user_id",
					"charlevel",
					"race",
					"class",
					"image",
					"gender",
					"guild",
					"specc_1_role",
					"specc_1_name",
					"specc_2_role",
					"specc_2_name",
					"main"
				))
				->values(
					$db->quote($data->realm) . "," .
					$db->quote($data->name). "," .
					JFactory::getUser()->id . "," .
					$db->quote($data->level). "," .
					$db->quote($data->race). "," .
					$db->quote($data->class). "," .
					$db->quote($data->thumbnail). "," .
					$db->quote($data->gender). "," .
					$db->quote($data->guild->name). "," .
					$db->quote($data->talents[0]->spec->role). "," .
					$db->quote($data->talents[0]->spec->name). "," .
					$db->quote($data->talents[1]->spec->role). "," .
					$db->quote($data->talents[1]->spec->name). "," .
					$db->quote(1)
				);

		$db->setQuery($query);

		if(!$db->query()){
			JError::raiseError(500, $db->getErrorMsg());
			return false;
		}

		return true;
	}
}
