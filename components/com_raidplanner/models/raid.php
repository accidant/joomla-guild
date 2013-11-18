<?php

/**
 * Class RaidPlannerModelRaid
 *
 * Date: 13.09.13
 * Time: 14:40
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.modeladmin");

class RaidPlannerModelRaid extends JModelAdmin{

	/**
	 * @param string $type
	 * @param string $prefix
	 * @param array  $config
	 *
	 * @return JTable|mixed
	 */
	public function getTable($type="Raid", $prefix="RaidPlannerTable", $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Abstract method for getting the form from the model.
	 *
	 * @param   array   $data      Data for the form.
	 * @param   boolean $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed  A JForm object on success, false on failure
	 * @since   11.1
	 */
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm("com_raidplanner.raid", "raid", array(
				"control" => "jform", "load_data" => $loadData
			));

		return (!empty($form))? $form : false;
	}

	public function save($data)
	{
		$date = new \DateTime($data["date"]);
		$data["date"] = $date->format("Y-m-d");

		parent::save($data);
		$this->saveInvites($data["char_id"]);

		return true;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState("com_raidplanner.edit.raid.data", array());
		if(empty($data)){
			$data = $this->getItem();
		}

		$data->char_id = $this->loadInvites($data->id);

		return $data;
	}

	private function saveInvites($invites)
	{
		$values = array();
		$raid_id = $this->getState("raid.id");
		$db = JFactory::getDbo();

		$this->saveNewInvites($invites, $raid_id, $db, $values);
		$this->removeNoLongerAvailableInvites($invites, $db, $raid_id);
	}

	private function loadInvites($raid_id)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
		$query->select('char_id')
			->from('#__raidplanner_invites')
			->where('raid_id = ' . $db->quote($raid_id));
		$db->setQuery($query);

		return $db->loadColumn();
	}

	/**
	 * @param JDatabase $db
	 * @param integer $raid_id
	 *
	 * @return array
	 */
	private function getCurrentInvites($db, $raid_id)
	{
		$query = $db->getQuery(true);
		$query->select("char_id")
			->from('#__raidplanner_invites')
			->where('raid_id = ' . $db->quote($raid_id));
		$db->setQuery($query);

		return $db->loadColumn();
	}

	/**
	 * @param array $invites
	 * @param integer $raid_id
	 * @param JDatabase $db
	 * @param integer $values
	 *
	 * @return array
	 */
	private function filterNewInvites($invites, $raid_id, $db, $values)
	{
		$current_invites = $this->getCurrentInvites($db, $raid_id);

		foreach ($invites as $invite)
		{
			if (!in_array($invite, $current_invites))
			{
				$values[] = $raid_id . "," . $invite . "," . $db->quote("invited");
			}
		}

		return $values;
	}

	/**
	 * @param array $invites
	 * @param integer $raid_id
	 * @param JDatabase $db
	 * @param array $values
	 */
	private function saveNewInvites($invites, $raid_id, $db, $values)
	{
		$values = $this->filterNewInvites($invites, $raid_id, $db, $values);

		if (!empty($values))
		{
			$query = $db->getQuery(true);
			$query->insert("#__raidplanner_invites")
			->columns(array("raid_id", "char_id", "status"))
			->values($values);
			$db->setQuery($query);
			$db->execute();
		}
	}

	/**
	 * @param array $invites
	 * @param JDatabase $db
	 * @param integer $raid_id
	 */
	private function removeNoLongerAvailableInvites($invites, $db, $raid_id)
	{
		$query = $db->getQuery(true);
		$query->delete('#__raidplanner_invites')
			->where('raid_id = ' . $db->quote($raid_id))
			->where('char_id NOT IN (' . implode(',', $invites) . ')');
		$db->setQuery($query);
		$db->execute();
	}
}
