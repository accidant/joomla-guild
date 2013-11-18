<?php
/**
 * Class ${NAME}
 *
 * Date: 13.09.13
 * Time: 13:49
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<tr>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this)" />
	</th>
	<th width="90"><?php echo JText::_("COM_RAIDPLANNER_RAID_DATE_LABEL"); ?></th>
	<th width="32px">&nbsp;</th>
	<th><?php echo JText::_("COM_RAIDPLANNER_RAID_NAME_LABEL"); ?></th>
	<th width="50"><?php echo JText::_("COM_RAIDPLANNER_RAID_MEMBERS"); ?></th>
	<th><?php echo JText::_("COM_RAIDPLANNER_RAID_STATUS"); ?></th>
	<?php if($this->canDo->get("core.edit")): ?>
		<th width="40px">&nbsp;</th>
	<?php endif; ?>
</tr>