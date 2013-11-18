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
class plgDSGLatestPosts extends JPlugin
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
		if ((class_exists('KunenaForum') && KunenaForum::isCompatible('3.0') && KunenaForum::installed()))
		{
			require_once __DIR__ . "/kunena.php";
			$latest_posts = new KunenaLatestPosts();
			$content = $latest_posts->getContent();

			return array("Beiträge" => $content);
		}
	}
}
