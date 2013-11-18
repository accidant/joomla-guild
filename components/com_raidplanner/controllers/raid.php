<?php

/**
 * Class RaidPlannerControllerRaid
 *
 * Date: 13.09.13
 * Time: 14:47
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.application.component.controllerform");

class RaidPlannerControllerRaid extends JControllerForm{

	public function show()
	{
		$this->hasAccess("raid.show");

		/** @var JModelAdmin $model */
		$model = $this->getModel("raid");
		$raid = $model->getItem($_GET['id']);

		/** @var JModelList $model */
		$model = $this->getModel("invites");
		$model->setState("raid.id", $_GET['id']);
		$invites = $model->getItems();

		$view = $this->getView("raids", "html");
		$view->item = $raid;
		$view->item->invites = $invites;

		$response = array(
			"content" => $view->loadTemplate("raid")
		);

		echo json_encode($response);
		exit;
	}

	public function delete()
	{
		$this->hasAccess("raid.delete");

		$db = JFactory::getDbo();

		$query = $db->getQuery(true);
		$query->delete("#__raidplanner_raids")
		->where("id = " . $db->quote($_POST['raid_id']));
		$db->setQuery($query);
		$db->execute();

		$query = $db->getQuery(true);
		$query->delete('#__raidplanner_invites')
		->where('raid_id = ' . $db->quote($_POST['raid_id']));
		$db->setQuery($query);
		$db->execute();

		echo json_encode(true);
		exit;
	}

	public function submit()
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $data = $_POST["jform"];

        $data["start_time"] = $this->createTime($data["start_time"]);
        $data["end_time"] = $this->createTime($data["end_time"]);

		$model = $this->getModel('raid');
        $model->save($data);

		$this->setRedirect(
			JRoute::_(
				'index.php?option=' . $this->option . '&view=' . $this->view_list
				. $this->getRedirectToListAppend(), false
			)
		);

        return true;
	}

	public function duplicate()
	{
		$this->hasAccess("core.create");

		$raid_model = $this->getModel("raid");
		$raid = $raid_model->getItem($_POST['id']);

		$invites_model = $this->getModel("invites");
		$invites_model->setState("raid.id", $_POST['id']);
		$invites = $invites_model->getItems();

		$new_invites = array();
		foreach($invites as $invite)
		{
			$new_invites[] = $invite->char_id;
		}

		$data = $raid->getProperties(true);
		unset($data['id']);

		$data["char_id"] = $new_invites;
		$data["date"] = $_POST["date"];

		$raid_model->save($data);

		echo json_encode(true);
		exit;
	}

	private function hasAccess($task)
	{
		$user = JFactory::getUser();

		if(!$user->authorise($task, "com_raidplanner"))
		{
			throw new Exception("Access denied", 403);
		}
	}


	/**
	 *@TODO MOVE TO A HELPER FUNCTION
	 *
	 */
    private function createTime($field){
        return $field["hours"]. ":" . $field["mins"];
    }
}
