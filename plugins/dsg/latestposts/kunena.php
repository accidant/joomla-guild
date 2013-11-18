<?php

/**
 * Class KunenaLatestPosts
 *
 * Date: 16.10.13
 * Time: 15:26
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class KunenaLatestPosts
{
	public function getContent()
	{
		KunenaFactory::loadLanguage('com_kunena.templates');
		KunenaFactory::loadLanguage('com_kunena.views');
		KunenaFactory::loadLanguage('com_kunena.models');
		KunenaFactory::loadLanguage('com_kunena.libraries', "admin");
		$params = array(
			'topics_categories' => 0,
			'topics_catselection' => 1,
			'userid' => JModel::getInstance("Profile", "UsersModel")->getState("user.id"),
			'mode' => 'latest',
			'sel' => 8760,
			'limit' => 6,
			'filter_order' => 'time',
			'limitstart' => 0,
			'filter_order_Dir' => 'desc',
		);
		ob_start();
		KunenaForum::display('topics', 'posts', 'embed', $params);
		$content= ob_get_contents();
		ob_end_clean();

		return $content;
	}

}
