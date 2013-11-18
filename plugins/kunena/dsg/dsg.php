<?php

/**
 * Class plgKunenaDsg
 *
 * Date: 26.09.13
 * Time: 16:16
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

class plgKunenaDsg extends JPlugin
{

	public function __construct(&$subject, $config = array())
	{
		if (!(class_exists('KunenaForum') && KunenaForum::isCompatible('3.0') && KunenaForum::installed())) return;

		parent::__construct($subject, $config);
	}

	/*
	 * Get Kunena avatar integration object.
	 *
	 * @return KunenaAvatar
	 */
	public function onKunenaGetAvatar() {
		if (!$this->params->get('avatar', 1)) return null;

		require_once __DIR__ . "/avatar.php";
		return new KunenaAvatarDsg($this->params);
	}

	/*
	 * Get Kunena profile integration object.
	 *
	 * @return KunenaProfile
	 */
	public function onKunenaGetProfile() {
		if (!$this->params->get('profile', 1)) return null;

		require_once __DIR__ . "/profile.php";
		return new KunenaProfileKunena($this->params);
	}
}
