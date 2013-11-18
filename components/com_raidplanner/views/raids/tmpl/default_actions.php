<?php
/**
 * Class ${NAME}
 *
 * Date: 16.09.13
 * Time: 11:52
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>

<div style="padding-bottom: 10px;">
	<input type="text" value="" style="width: 100%;" placeholder="Kommentar..." name="comment" id="multiple_status_comment" />
</div>
<div class="clearfix"></div>
<?php if($this->canDo->get("invites.changestatus")): ?>
<button type="button" class="button" onclick="$.fn.Raidplanner().updateMultipleCharStatus('accepted');" id="multiple-accept"><?php echo JText::_("COM_RAIDPLANNER_STATUS_ACCEPT"); ?></button>
<button type="button" class="button" onclick="$.fn.Raidplanner().updateMultipleCharStatus('temporary');" id="multiple-temporary"><?php echo JText::_("COM_RAIDPLANNER_STATUS_TEMPORARY"); ?></button>
<button type="button" class="button" onclick="$.fn.Raidplanner().updateMultipleCharStatus('rejected');" id="multiple-reject"><?php echo JText::_("COM_RAIDPLANNER_STATUS_REJECT"); ?></button>
<?php endif; ?>
<?php if($this->canDo->get("core.create")): ?>
<a class="button" style="float: right;" href="<?php echo JRoute::_("index.php?option=com_raidplanner&task=raid.add&layout=edit"); ?>"><?php echo JText::_("COM_RAIDPLANNER_ADD_RAID"); ?></a>
<?php endif; ?>
