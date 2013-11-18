<?php

/**
 * Class KunenaAvatarDsg
 *
 * Date: 26.09.13
 * Time: 16:27
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class KunenaAvatarDsg extends KunenaAvatar
{

	public function __construct($params) {
		$this->params = $params;
		$this->resize = true;
	}


	protected function _getURL($user, $sizex, $sizey)
	{
		$user = KunenaFactory::getUser($user);
		$avatar = $user->avatar;
		$path = KPATH_MEDIA ."/avatars";
		$config = KunenaFactory::getConfig();

		if ( !is_file("{$path}/{$avatar}"))
		{

			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select("image")
				->from("#__wowchars")
				->where(array(
					'user_id = '. $db->quote($user->userid),
					'main = 1'
				));

			$db->setQuery($query);
			$result = $db->loadAssoc();

			if($result != null)
			{
				JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

				return WowCharsHelperWowChars::$static_host . $result["image"];
			}
			// If avatar does not exist use default image
			if ($sizex <= 90) $avatar = 's_nophoto.jpg';
			else $avatar = 'nophoto.jpg';
		}

		$dir = dirname($avatar);
		$file = basename($avatar);
		if ($sizex == $sizey) {
			$resized = "resized/size{$sizex}/{$dir}";
		} else {
			$resized = "resized/size{$sizex}x{$sizey}/{$dir}";
		}
		if ( !is_file( "{$path}/{$resized}/{$file}" ) ) {
			require_once(KPATH_SITE.'/lib/kunena.image.class.php');
			CKunenaImageHelper::version("{$path}/{$avatar}", "{$path}/{$resized}", $file, $sizex, $sizey, intval($config->avatarquality));
		}
		return KURL_MEDIA . "avatars/{$resized}/{$file}";
	}

}
