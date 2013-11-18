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
JHtml::_('behavior.calendar');
?>
<?php if(count($this->items) > 0): ?>
<?php foreach($this->items as $i => $item): ?>
		<tr id="showRaid-<?php echo $item->id; ?>" class="row<?php echo $i %2; ?>">
			<td><?php echo JHtml::_("grid.id", $i, $item->id); ?></td>
			<td>
				<?php echo JHtml::date($item->date, "D, d.m.Y"); ?><br />
				<?php echo JHtml::date($item->start_time, "H:i"); ?> - <?php echo JHtml::date($item->end_time, "H:i"); ?>
			</td>
			<td>
				<?php if($item->raid != "") : ?>
					<div class="raid-icon-small <?php echo $item->raid; ?>"></div>
				<?php endif; ?>
			</td>
			<td>
				<?php echo $item->name; ?><br/>
				<?php if ($item->raid_type == "raid" && $item->raid != ""){
					echo JText::_("COM_RAIDPLANNER_RAID_" . strtoupper($item->raid));
				}else{
					echo JText::_("COM_RAIDPLANNER_RAID_TYPE_" . strtoupper($item->raid_type));
				}
				?> (<?php echo JText::_("COM_RAIDPLANNER_RAID_SIZE_" . strtoupper($item->size)); ?>)
			</td>
			<td><?php echo $item->accepted . " / " . $item->invited; ?></td>
			<td class="invite-status"><span class="<?php echo $item->status ?>"><?php echo JText::_("COM_RAIDPLANNER_STATUS_" . strtoupper($item->status)); ?></span></td>
			<?php if($this->canDo->get("core.edit")): ?>
			<td class="table-actions">

				<a title="Bearbeiten" class="lsf-icon edit" href="<?php echo JRoute::_("index.php?option=com_raidplanner&task=raid.edit&layout=edit&id=" . $item->id); ?>" ></a>
				<input id="duplicate-<?php echo $i; ?>" type="hidden" value="now" name="duplicate-<?php echo $i; ?>" title="" />
				<a title="Duplizieren" class="lsf-icon copy" id="duplicate-<?php echo $i; ?>-button"></a>
			</td>
			<?php endif; ?>
		</tr>
<?php endforeach; ?>
	<script type="text/javascript">
		<?php foreach($this->items as $i => $item){
			echo 'window.addEvent(\'domready\', function() {Calendar.setup({
					// Id of the input field
					inputField: "duplicate-'.$i.'",
					// Format of the input field
					ifFormat: "%Y-%m-%d",
					// Trigger for the calendar (button ID)
					button: "duplicate-' . $i.'-button",
					// Alignment (defaults to "Bl")
					align: "Tl",
					singleClick: false,
					multiple: true,
					firstDay: ' . JFactory::getLanguage()->getFirstDay() . ',
					onClose: $.fn.Raidplanner().duplicateRaid
					});});
				';
		} ?>
	</script>
<?php else: ?>
	<tr class="row<?php echo $i %2; ?>">
		<td class="empty-result" colspan="7">Keine Raids geplant</td>
	</tr>
<?php endif; ?>