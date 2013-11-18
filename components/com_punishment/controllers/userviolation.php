<?php
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controllerform");

/**
 * Class PunishmentControllerUserViolation
 *
 * Date: 11.11.13
 * Time: 10:12
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class PunishmentControllerUserViolation extends JControllerForm{

	public function submit()
	{
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$model = $this->getModel('userviolation');
		$model->save($_POST['jform']);

		$this->handOutPunishment($_POST['jform']['user_id']);

		$this->view_list = "users";

		$this->setRedirect(
			 JRoute::_(
				   'index.php?option=' . $this->option . '&view=' . $this->view_list
				   . $this->getRedirectToListAppend(), false
			 )
		);

		return true;
	}

	public function doRedemption()
	{

		$current_date = new DateTime();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__punishment_redemption')
			  ->columns(array("user_id", "redemption_date"))
			  ->values($db->quote($_GET['user_id']).",".$db->quote($current_date->format('Y-m-d')));
		$db->setQuery($query)->execute();

		$query = $db->getQuery(true);
		$query->select('id')
			  ->from('#__punishment_redemption')
			  ->where('user_id = '. $db->quote($_GET['user_id']))
			  ->where('redemption_date = ' . $db->quote($current_date->format('Y-m-d')));

		$pk = $db->setQuery($query)->loadResult();

		$query = $db->getQuery(true);
		$query->update('#__punishment_user_violation')
			  ->set('expired = 1, redemption_id = ' . $db->quote($pk))
			  ->where('user_id = '. $db->quote($_GET['user_id']))
			  ->where('expired = 0');
		$db->setQuery($query)->execute();

		$this->setRedirect(
			 JRoute::_(
				   'index.php?option=com_users&view=profile&user_id='.$_GET['user_id'].'#Strafen'
				   . $this->getRedirectToListAppend(), false
			 )
		);
	}

	public function getUserTable()
	{
		$db = JFactory::getDbo();
		$current_date = new \DateTime();
		$configs = JComponentHelper::getParams("com_punishment");

		$user = JFactory::getUser($_GET['user_id']);

		$query = $db->getQuery(true);
		$query->select('*')
			->from('#__punishment_violation v')
			->innerJoin('#__punishment_user_violation uv ON uv.violation_id = v.id')
			->leftJoin('#__punishment_redemption r ON r.id = uv.redemption_id')
			->where('uv.user_id = '.$db->quote($user->id));

		$violations = $db->setQuery($query)->loadAssocList();


		$query = $db->getQuery(true);
		$query->select('*')
			  ->from('#__punishment p')
			  ->innerJoin('#__punishment_user_punishment up ON up.punishment_id = p.id')
			  ->where('up.user_id = '.$db->quote($user->id));

		$punishments = $db->setQuery($query)->loadAssocList();

		$num_redemptions = $this->getNumRedemptions($user);
		$redemption_cost = $configs->get('redemption_cost') + ($num_redemptions * $configs->get('redemption_cost_increment'));


		$this->addViewPath(JPATH_ROOT.DS."components".DS."com_punishment".DS."views");
		$view = $this->getView("userviolation", "html");
		$view->violations = $violations;
		$view->punishments = $punishments;
		$view->redemption_cost = $redemption_cost;
		$view->user = $user;
		$view->addTemplatePath(JPATH_ROOT . DS . "components" . DS . "com_punishment" . DS . "views". DS . "userviolation" . DS . "tmpl");
		return $view->loadTemplate("violations");
	}

	/**
	 * @param int $user_id
	 */
	protected function handOutPunishment($user_id)
	{
		$points = $this->getCurrentPoints($user_id);
		$punishment_id = $this->getPossiblePunishment($points);

		if($this->punishmentRequired($punishment_id, $user_id))
		{
			$current_date = new DateTime();
			$current_date = $current_date->format('Y-m-d');

			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->insert('#__punishment_user_punishment')
				->columns($db->quoteName(array('user_id', 'punishment_id', 'punishment_date')))
				->values(implode(',', array($user_id, $punishment_id, $db->quote($current_date))));

			$db->setQuery($query)->execute();
		}
	}

	/**
	 * @param int $user_id
	 *
	 * @return int
	 */
	protected function getCurrentPoints($user_id)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
		$query->select('SUM(points)')
			  ->from('#__punishment_violation v')
			  ->innerJoin('#__punishment_user_violation uv ON uv.violation_id = v.id')
			  ->where('uv.user_id = ' . $db->quote($user_id))
			  ->where('uv.expired = 0');

		return $db->setQuery($query)->loadResult();
}

	/**
	 * @param int $result
	 *
	 * @return int
	 */
	protected function getPossiblePunishment($result)
	{
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('p.id')
			  ->from('#__punishment p')
			  ->where('p.threshold <= ' . $db->quote($result))
			  ->order(array('p.threshold DESC'));

		$result = $db->setQuery($query, 0, 1)->loadResult();

		return $result;
	}

	/**
	 * @param int $punishment_id
	 * @param int $user_id
	 *
	 * @return bool
	 */
	protected function punishmentRequired($punishment_id, $user_id)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select("COUNT(up.id)")
			  ->from('#__punishment_user_punishment up')
			  ->leftJoin('#__punishment_user_reset ur ON ur.user_id = up.user_id')
			  ->where('up.user_id = ' . $db->quote($user_id))
			  ->where('up.punishment_id = '. $db->quote($punishment_id))
			  ->where('(up.punishment_date >
					(
					SELECT ur.reset_date
					FROM #__punishment_user_reset ur
					WHERE ur.user_id = ' . $db->quote($user_id) . '
					ORDER BY ur.reset_date ASC
					LIMIT 1
					) OR (
					SELECT ur.reset_date
					FROM #__punishment_user_reset ur
					WHERE ur.user_id = ' . $db->quote($user_id) . '
					ORDER BY ur.reset_date ASC
					LIMIT 1
					) IS NULL
				)');

		$result = $db->setQuery($query, 0, 1)->loadResult();

		return ($result == 0);
	}

	/**
	 * @param JUser $user
	 *
	 * @return int mixed
	 */
	protected function getNumRedemptions($user)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('COUNT(r.id)')
			  ->from('#__punishment_redemption r')
			  ->where('r.user_id =' . $db->quote($user->id))
			  ->where(
			  '(r.redemption_date > (
							SELECT MAX(ur.reset_date)
							FROM #__punishment_user_reset ur
							WHERE ur.user_id = ' . $db->quote($user->id) . '
			) OR
			(SELECT MAX(ur.reset_date)
				FROM #__punishment_user_reset ur
				WHERE ur.user_id = ' . $db->quote($user->id) . '
			) IS NULL)'
			);

		$num_redemptions = $db->setQuery($query)->loadResult();

		return $num_redemptions;
}
}
 