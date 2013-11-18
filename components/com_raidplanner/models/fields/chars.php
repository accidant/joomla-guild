<?php

/**
 * Class chars
 *
 * Date: 16.09.13
 * Time: 13:52
 * @author Thomas Joußen <tjoussen@databay.de>
 */
// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('checkboxes');


class JFormFieldChars extends JFormFieldCheckboxes {

	protected function getInput()
	{
		$input = parent::getInput();

		$input .= "
			<input id='check_all_chars' style='margin-left: 164px;' type='checkbox' name='toggle' value='' onclick='Joomla.checkAll(this, \"jform_char_id\")' />
			<label for='check_all_chars' style='display: inline;float: none;'>Alle auswählen</label>
			";

		return $input;
	}


	protected function getOptions()
	{
		JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
				 ->select("*")
				 ->from($db->quoteName("#__wowchars"));

		$db->setQuery($query);

		$results = $db->loadAssocList();

		$options = array();

		$spec = WowCharsHelperWowChars::$specc_image_host;

		foreach($results as $result)
		{
			$text = $result['charname'] . "&nbsp;";

			$specc1 = WowCharsHelperWowChars::getSpeccImage($result['specc_1_role']);
			$specc2 = WowCharsHelperWowChars::getSpeccImage($result['specc_2_role']);

			if($specc1 != ""){
				$text .= '<image src="'.$spec . $specc1.'" width="14px" height="14px"/>';
			}
			if($specc2 != ""){
				$text .= '<image src="'.$spec . $specc2.'" width="14px" height="14px"/>';
			}


			$tmp = JHtml::_("select.option", $result["id"], $text, "value", "text", false);

			$tmp->class = strtolower(WowCharsHelperWowChars::getClass($result["class"]));

			$options[] = $tmp;
		}

		return $options;
	}
}
