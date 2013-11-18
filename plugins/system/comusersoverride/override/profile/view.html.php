<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Profile view class for Users.
 *
 * @package		Joomla.Site
 * @subpackage	com_users
 * @since		1.6
 */
class UsersViewProfile extends JViewLegacy
{
	protected $data;
	protected $form;
	protected $params;
	protected $state;
	protected $tabs = array();

	/**
	 * Method to display the view.
	 *
	 * @param	string	$tpl	The template file to include
	 * @since	1.6
	 */
	public function display($tpl = null)
	{
		// Get the view data.
		$user_id = JFactory::getApplication()->input->get("user_id");
		JFactory::getApplication()->setUserState('com_users.edit.profile.id', $user_id);

		$this->data		= $this->get('Data');
		$this->form		= $this->get('Form');
		$this->state	= $this->get('State');
		$this->params	= $this->state->get('params');

		$user = JFactory::getUser($user_id);
		$this->getCharImage($user);


		$this->addTemplatePath(JPATH_PLUGINS . DS . "system" . DS . "comusersoverride" . DS ."override". DS ."profile" . DS . "tmpl");
		$this->tabs = array();

		JPluginHelper::importPlugin('dsg');
		$dispatcher = JDispatcher::getInstance();
		$results = $dispatcher->trigger( 'onTabsCreated', array() );

		foreach($results as $result)
		{
			foreach($result as $title => $content)
			{
				$this->tabs[$title] = $content;
			}
		}

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		}

		// Check if a user was found.
		if (!$this->data->id) {
			JError::raiseError(404, JText::_('JERROR_USERS_PROFILE_NOT_FOUND'));
			return false;
		}

		// Check for layout override
		$active = JFactory::getApplication()->getMenu()->getActive();
		if (isset($active->query['layout'])) {
			$this->setLayout($active->query['layout']);
		}

		//Escape strings for HTML output
		$this->pageclass_sfx = htmlspecialchars($this->params->get('pageclass_sfx'));

		$this->prepareDocument();

		parent::display($tpl);
	}

	/**
	 * Prepares the document
	 *
	 * @since	1.6
	 */
	protected function prepareDocument()
	{
		$app		= JFactory::getApplication();
		$menus		= $app->getMenu();
		$user		= JFactory::getUser();
		$login		= $user->get('guest') ? true : false;
		$title 		= null;

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();
		if($menu) {
			$this->params->def('page_heading', $this->params->get('page_title', $user->name));
		} else {
			$this->params->def('page_heading', JText::_('COM_USERS_PROFILE'));
		}

		$title = $this->params->get('page_title', '');
		if (empty($title)) {
			$title = $app->getCfg('sitename');
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 1) {
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2) {
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}
		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}

	/**
	 * @param JUser $user
	 *
	 * @return mixed
	 */
	protected function getCharImage($user)
	{
		if (!array_key_exists("avatar", $this->data->profile) || $this->data->profile["avatar"] == "")
		{
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select("image")
				  ->from("#__wowchars")
				  ->where(
				  array(
					  'user_id = ' . $db->quote($user->get('id')),
					  'main = 1'
				  )
				);

			$db->setQuery($query);
			$result = $db->loadAssoc();

			if ($result != null)
			{
				JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers');

				$this->data->profile["avatar"] = WowCharsHelperWowChars::$static_host . $result["image"];

			}
		}
	}
}
