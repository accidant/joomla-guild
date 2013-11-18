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
class plgDSGPunishment extends JPlugin
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
		$this->loadLanguage();
		//JFormHelper::addFieldPath(dirname(__FILE__) . '/fields');
	}

	public function onTabsCreated()
	{
		require_once JPATH_ROOT.DS.'components'.DS.'com_punishment'.DS.'controllers'.DS.'userviolation.php';

		$controller = new PunishmentControllerUserViolation();
		$content = $controller->getUserTable();

		return array("Strafen" => $content);
	}
}
