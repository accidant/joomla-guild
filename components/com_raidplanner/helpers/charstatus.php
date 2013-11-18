<?php

/**
 * Class RaidPlannerHelperCharStatus
 *
 * Date: 24.09.13
 * Time: 14:37
 * @author Thomas Joußen <tjoussen@databay.de>
 */ 
class RaidPlannerHelperCharStatus {

	/**
	 * @param integer $raid_id
	 *
	 * @return array
	 */
	public static function update($raid_id)
	{
		$db     = JFactory::getDbo();
		$result = array();

		$query = $db->getQuery(true);
		$query->update("#__raidplanner_invites")
		->set("status = " . $db->quote($_POST["status"]))
		->set("comment = " . $db->quote($_POST['comment']))
		->where('char_id = ' . $db->quote($_POST['char_id']))
		->where('raid_id = ' . $db->quote($raid_id));
		$db->setQuery($query);
		$success = $db->execute();

		if ($success)
		{
			$result = array(
				'status'      => $_POST['status'],
				'status_text' => JText::_("COM_RAIDPLANNER_STATUS_" . strtoupper($_POST['status'])),
				'raid_id' => $raid_id
			);
		}

		return $result;
	}
}
