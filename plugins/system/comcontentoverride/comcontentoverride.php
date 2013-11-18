<?php

defined('JPATH_BASE') or die;


jimport('joomla.utilities.date');

/**
 * Class plgUserProfile
 *
 * Date: 09.10.13
 * Time: 15:41
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class plgSystemComContentOverride extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.5
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		//$this->loadLanguage();
		//JFormHelper::addFieldPath(dirname(__FILE__) . '/fields');
	}

	public function onAfterRoute()
	{
		$app = JFactory::getApplication();
		$input = $app->input;

		if("com_kunena" == $input->getCmd("option", "") && $app->isSite())
		{
			require_once(dirname(__FILE__) . DS .'librarykunenauser.php');
		}
	}

	public function onBeforeRender()
	{
		$app = JFactory::getApplication();

		//var_dump("test");exit;
	}
}
