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
class plgSystemComUsersOverride extends JPlugin
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

		if("com_users" == $input->getCmd("option", "") && "profile" == $input->getCmd("view", "") && $app->isSite())
		{
			require_once(dirname(__FILE__) . DS . 'override' . DS . 'profile' . DS .'view.html.php');
		}
	}

	public function onBeforeRender()
	{
		$app = JFactory::getApplication();

		//var_dump("test");exit;
	}
}
