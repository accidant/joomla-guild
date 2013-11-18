<?php

/**
 * Class WowCharsControllerAddChar
 *
 * Date: 09.09.13
 * Time: 16:32
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controllerform");

class WowCharsControllerAddChar extends JControllerForm
{

	public function getModel($name = '', $prefix= '', $config = array('ignore_request' => true)){
		return parent::getModel($name, $prefix, array('ignore_request' => false));
	}

	public function submit()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$app = JFactory::getApplication();
		$model = $this->getModel('addchar');

		$char = $this->loadCharacterData($_POST['realm'], $_POST['charname']);

		if($char->status == 'nok')
		{
			$msg = JText::_($char->reason);
			$link = JRoute::_("index.php?option=com_wowchars&view=addchar&tmpl=component", false);
			$this->setRedirect($link, $msg);
			$app->setUserState("success", false);
			return false;
		}
		$added_char = $model->addItem($char);

		if($added_char)
		{
			$link = JRoute::_("index.php?option=com_wowchars&view=addchar&tmpl=component", false);
			$this->setRedirect($link);
			$app->setUserState("success", true);
		}else
		{
			$msg = JText::_("Fehler");
			$link = JRoute::_("index.php?option=com_wowchars&view=addchar&tmpl=component", false);
			$this->setRedirect($link, $msg);
			$app->setUserState("success", false);
		}

		return true;
	}

	private function loadCharacterData($realm, $charname){
		JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

		$realm = WowCharsHelperWowChars::normalize($realm);
		$url = WowCharsHelperWowChars::$host . "/api/wow/character/" . $realm . "/" . $charname . "?locale=de_DE&fields=guild,talents";

		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
		$data = curl_exec($ch);
		curl_copy_handle($ch);

		return json_decode($data);
	}
}
