<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
JFormHelper::loadFieldClass("file");

/**
 * Class JFormFieldAvatar
 *
 * Date: 10.10.13
 * Time: 12:32
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class JFormFieldAvatar extends JFormFieldFile
{

	/**
	 * @var string
	 */
	public $type = "Avatar";

	protected function getInput()
	{
		$input = "";
		if($this->value != null || $this->value != ""){
			$input = '<div class="avatar" style="height: 180px; width: 180px; line-height: 180px; margin: 10px 0 0 150px;"><img style="vertical-align: middle; width: 100%; height: 100%;"src="/'.$this->value.'" alt="profile-image" /></div>';
		}

		return parent::getInput() . $input;
	}
}
