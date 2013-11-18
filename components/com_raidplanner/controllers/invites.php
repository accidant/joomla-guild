<?php

/**
 * Class RaidPlannerControllerInvites
 *
 * Date: 25.09.13
 * Time: 13:43
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controllerform");

class RaidPlannerControllerInvites extends JControllerForm
{
	public function changeStatus()
	{
		$this->hasAccess("invites.changestatus");

		$this->update($_POST['raid_id'], $_POST['char_id']);

		echo json_encode($this->createResult($_POST['raid_id']));
		exit;
	}

	public function changeStatusMultiple()
	{
		$this->hasAccess("invites.changestatus");

		$results = array();

		foreach($_POST['raid_ids'] as $key => $raid_id)
		{
			$this->update($raid_id, $_POST['char_id']);
			$results[$key] = $this->createResult($raid_id);
		}

		echo json_encode($results);
		exit;
	}

	public function administrate()
	{
		$this->hasAccess("invites.administrate");

		$db = JFactory::getDbo();

		$this->update($_POST['raid_id'], $_POST['chars'], $this->getStatusRequirements($_POST['status'],$db));
		$results = $this->getChanges($db);

		foreach($results as $key => $result)
		{
			$results[$key]['status_text'] = JText::_("COM_RAIDPLANNER_STATUS_" . strtoupper($result['status']));
		}

		echo json_encode($results);
		exit;
	}

	/**
	 * @param integer $id
	 * @param integer|array $char_ids
	 * @param array $requirements
	 *
	 * @return boolean
	 */
	private function update($id, $char_ids, $requirements = array())
	{
		$db     = JFactory::getDbo();
		$char_ids = (array)$char_ids;
		$char_ids = array_filter($char_ids, function($element) {
				return ($element != "");
		});

		$query = $db->getQuery(true);
		$query->update("#__raidplanner_invites")
			->set("status = " . $db->quote($_POST["status"]))
			->where("char_id IN (". implode(",",$char_ids) . ")")
			->where('raid_id = ' . $db->quote($id));

		if(isset($_POST['comment'])) $query->set("comment = " . $db->quote($_POST['comment']));
	//	if(!empty($requirements)) $query->where("(".implode(" OR ", $requirements).")");

		return $db->setQuery($query)->execute();
	}

	/**
	 * @param integer $id
	 *
	 * @return array
	 */
	private function createResult($id)
	{
		return array(
			'status'      => $_POST['status'],
			'status_text' => JText::_("COM_RAIDPLANNER_STATUS_" . strtoupper($_POST['status'])),
			'raid_id'     => $id
		);
	}

	/**
	 * @param $db
	 *
	 * @return mixed
	 */
	private function getChanges($db)
	{
		$char_ids = (array)$_POST['chars'];
		$char_ids = array_filter($char_ids, function($element) {
				return ($element != "");
			});

		$query = $db->getQuery(true);
		$query->select('char_id, status')
		->from('#__raidplanner_invites')
		->where("char_id IN (" . implode(",", $char_ids) . ")")
		->where('status = ' . $db->quote($_POST['status']))
		->where('raid_id = ' . $db->quote($_POST['raid_id']));
		$db->setQuery($query);
		$results = $db->loadAssocList();

		return $results;
	}

	private function getStatusRequirements($status, $db)
	{
		$requirements = array(
			"confirmed" => array(
				'status = '. $db->quote("accepted"),
				'status = '. $db->quote("waiting"),
				'status = '. $db->quote("refused")
			),
			"waiting" => array(
				'status = '. $db->quote("accepted"),
				'status = '. $db->quote("confirmed"),
				'status = '. $db->quote("temporary"),
				'status = '. $db->quote("refused")
			),
			"refused" => array(
				'status = '. $db->quote("accepted"),
				'status = '. $db->quote("confirmed"),
				'status = '. $db->quote("waiting"),
				'status = '. $db->quote("temporary"),
				'status = '. $db->quote("rejected")
			),
			"cancelled" => array(),
		);

		return $requirements[$status];
	}

	private function hasAccess($task)
	{
		$user = JFactory::getUser();

		if(!$user->authorise($task, "com_raidplanner"))
		{
			throw new Exception("Access denied", 403);
		}
	}
}
