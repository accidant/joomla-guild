<?php
// No direct access to this file
defined('_JEXEC') or die;
 
// import the list field type
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');
 
/**
 * HelloWorld Form Field class for the HelloWorld component
 */
class JFormFieldTime extends JFormFieldList{

	/**
	* The field type
	*
	* @var string
	*/
	protected $type = "Time";
	
	public function getInput()
	{
		$options = $this->renderTimeOptions();
        $name = $this->name;
		
		$output =  '<select name="'.$name.'[hours]">' . implode(" ", $options["hours"]).'</select>';
		$output .=  '<select name="'.$name.'[mins]">' . implode(" ", $options["mins"]).'</select>';
		return $output;
	}
	
	private function renderTimeOptions()
	{
		$time = explode(":", $this->value);

		$options = array(
			"hours" => array(),
			"mins" => array()
		);
		
		for($i=0;$i<24;$i++)
		{
			$selected = "";
			if((int)$time[0] == $i){
				$selected = 'selected="selected" ';
			}

			$options["hours"][] = '<option '.$selected.'value="'.str_pad( $i, 2, 0, STR_PAD_LEFT ).'">'.str_pad( $i, 2, 0, STR_PAD_LEFT ).'</option>';
		}
		for($i=0;$i<60;$i+=5)
		{
			$selected = "";
			if((int)$time[1] == $i){
				$selected = 'selected="selected" ';
			}

			$options["mins"][] = '<option '.$selected.'value="'.str_pad( $i, 2, 0, STR_PAD_LEFT ).'">'.str_pad( $i, 2, 0, STR_PAD_LEFT ).'</option>';
		}
		
		return $options;
	}
}
