<?php

/**
 * Class RaidPlannerControllerRaids
 *
 * Date: 13.09.13
 * Time: 15:05
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controlleradmin");

class RaidPlannerControllerRaids extends JControllerAdmin
{
	public function getModel($name ="Raid", $prefix="RaidPlannerModel"){
		$model = parent::getModel($name, $prefix, array("ignore_request" => true));
		return $model;
	}

	public function updateTable()
	{
		$model = $this->getModel("Raids");
		$view = $this->getView("raids", "html");

		$view->items = $model->getItems();

		$output = $view->loadTemplate("body");

		echo json_encode(array("content" => $output));
		exit;
	}

	public function getUserRaidStats()
	{
		$this->addViewPath(JPATH_ROOT.DS."components".DS."com_raidplanner".DS."views");
		JLoader::register('RaidPlannerHelper', JPATH_ROOT . DS . 'components' .DS. 'com_raidplanner' .DS. 'helpers' . DS . 'raidplanner.php');
		JModel::addIncludePath(JPATH_ROOT.DS."components".DS."com_raidplanner".DS."models");

		$user = JFactory::getUser(JModel::getInstance("Profile", "UsersModel")->getState("user.id"));

		$model = $this->getModel("Raids");
		$view = $this->getView("raids", "html");
		/** @var JView $view */
		$rais_ids = array();
		$stats = array();

		$next_id_date = new DateTime("+1 Wednesday");
		$current_id_date = new DateTime("-1 Wednesday");
		$last_month =  new DateTime("-1 Wednesday -4 Weeks");
		$last_half =  new DateTime("-1 Wednesday -24 Weeks");

		foreach($model->getItems() as $item)
		{
			$rais_ids[] = $item->id;
		}

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('invites.raid_id, invites.char_id, invites.status, raids.date, chars.charname, chars.class')
			->from('#__raidplanner_invites invites')
			->innerJoin('#__raidplanner_raids raids ON raids.id = invites.raid_id')
			->innerJoin('#__wowchars chars ON chars.id = invites.char_id')
			->where("chars.user_id = " . $db->quote($user->id));

		$db->setQuery($query);
		$results = $db->loadAssocList();

		foreach($results as $result)
		{
			if(!array_key_exists($result["char_id"], $stats)){
				$stats[$result['char_id']] = $this->prepareStatsArray();
				$stats[$result['char_id']]['charname'] = $result['charname'];
				$stats[$result['char_id']]['class'] = $result['class'];
			}
			$date = new DateTime($result['date']);
			if($date >= $current_id_date && $date < $next_id_date)
			{
				$stats[$result['char_id']]['current_id']['participated'] += $this->incrementParticipated($result);
				$stats[$result['char_id']]['current_id']['total'] += $this->incrementTotal($result);
			}
			if($date >= $last_month && $date < $next_id_date){
				$stats[$result['char_id']]['last_month']['participated'] += $this->incrementParticipated($result);
				$stats[$result['char_id']]['last_month']['total'] += $this->incrementTotal($result);
			}
			if($date >= $last_half && $date < $next_id_date){
				$stats[$result['char_id']]['half_year']['participated'] += $this->incrementParticipated($result);
				$stats[$result['char_id']]['half_year']['total'] += $this->incrementTotal($result);
			}
			if($date < $next_id_date){
				$stats[$result['char_id']]['overall']['participated'] += $this->incrementParticipated($result);
				$stats[$result['char_id']]['overall']['total'] += $this->incrementTotal($result);
			}
		}

		$view->stats = $stats;

		$view->addTemplatePath(JPATH_ROOT . DS . "components" . DS . "com_raidplanner" . DS . "views". DS . "raids" . DS . "tmpl");
		return $view->loadTemplate("stats");
	}

	private function incrementTotal($result)
	{
		return ($result["status"] != "cancelled")? 1 : 0;
	}

	private function incrementParticipated($result)
	{
		return (
			$result["status"] != "cancelled" &&
			$result["status"] != "refused" &&
			$result["status"] != "rejected" &&
			$result["status"] != "temporary" &&
			$result["status"] != "invited"
		)? 1: 0;
	}

	private function prepareStatsArray()
	{
		return array(
			"charname" => "",
			"class" => 0,
			'current_id' => array(
				'participated' => 0,
				'total' => '0'
			),
			'last_month' => array(
				'participated' => 0,
				'total' => '0'
			),
			'half_year' => array(
				'participated' => 0,
				'total' => '0'
			),
			'overall' => array(
				'participated' => 0,
				'total' => '0'
			)
		);
	}
}
