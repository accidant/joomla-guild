<?php
/**
 * Class ${NAME}
 *
 * Date: 16.09.13
 * Time: 15:38
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );
?>

<div class="box">
	<div class="raid">
		<div class="img">
			<div class="raid-icon <?php echo $this->item->raid; ?>"></div>
		</div>
		<div class="title">
			<h1><?php echo $this->item->name; ?></h1>
			<p class="raid-type">
				<?php if($this->item->raid != ""){
					echo JText::_("COM_RAIDPLANNER_RAID_" . strtoupper($this->item->raid));
				} else{
					echo JText::_("COM_RAIDPLANNER_RAID_TYPE_" . strtoupper($this->item->raid_type));
				}?> (<?php echo JText::_("COM_RAIDPLANNER_RAID_SIZE_". $this->item->size); ?>)
			</p>
			<p class="raid-date"><?php echo JHtml::date($this->item->date, "D (d.m.Y)") . " " . JHtml::date($this->item->start_time, "H:i") . " - " . JHtml::date($this->item->end_time, "H:i"); ?></p>
		</div>
		<div class="adminFunction">
			<?php if($this->canDo->get("raid.delete")): ?>
				<button type="button" class="button" onclick="$.fn.Raidplanner().deleteRaid('<?php echo $this->item->id; ?>')">Löschen</button>
			<?php endif; ?>
			<?php if($this->canDo->get("invites.administrate")): ?>
				<button type="button" class="button" onclick="$.fn.Raidplanner().cancelRaid('<?php echo $this->item->id; ?>')">Absagen</button>
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>
		<div class="description">
			<p class="raid-description">
				<?php echo $this->item->description; ?>
			</p>
		</div>
		<form name="charStatusForm">
		<div class="button-list">
			<?php if($this->canDo->get("invites.changestatus")): ?>
			<button type="button" class="button charStatus" onclick="$.fn.Raidplanner().changeCharStatus('<?php echo $this->item->id; ?>', 'accepted')">Annehmen</button>
			<button type="button" class="button charStatus" onclick="$.fn.Raidplanner().changeCharStatus('<?php echo $this->item->id; ?>', 'temporary')">Vorläufig</button>
			<button type="button" class="button charStatus" onclick="$.fn.Raidplanner().changeCharStatus('<?php echo $this->item->id; ?>', 'rejected')">Ablehnen</button>
			<?php endif; ?>
		</div>
		<div class="clearfix"></div>
		<div style="padding-top: 10px;">
			<fieldset>
				<input type="text" name="comment" class="invite-comment" placeholder="Kommentar.." style="width: 673px;"/>
			</fieldset>
		</div>
		</form>
		<div class="members">
			<h2 class="member-header"><?php echo count($this->item->invites);?> eingeladen</h2>
			<form name="adminForm" id="member-table">
				<table>
					<tbody class="member-table">
						<?php foreach($this->item->invites as $key => $invite):?>
							<tr class="invite-<?php echo $invite->char_id; ?>">
								<?php if($this->canDo->get("invites.administrate")): ?>
									<td style="width: 10px;"><input class="invites" type="checkbox" name="invites[]" id="invites<?php echo $key; ?>" title="Auswählen" value="<?php echo $invite->char_id; ?>" /></td>
								<?php endif; ?>
								<td><span class="<?php echo strtolower(WowCharsHelperWowChars::getClass($invite->class)); ?>"><?php echo $invite->charname; ?></span> </td>
								<td class="invite-status"><span class="<?php echo $invite->status; ?>"><?php echo JText::_("COM_RAIDPLANNER_STATUS_" . strtoupper($invite->status));?></span></td>
								<td class="invite-comment"><?php echo $invite->comment; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<?php if($this->canDo->get("invites.administrate")): ?>
					<tfoot>
						<tr>
							<td colspan="2">
								<input type="checkbox" onclick="Joomla.checkAll(this, 'invites')" value="" name="toggle">
								<label>Alle auswählen</label>
							</td>
							<td colspan="2" class="leadingButtons">
								<button type="button" class="button" onclick="$.fn.Raidplanner().changeLeadingStatus('<?php echo $this->item->id; ?>', 'confirmed')">Bestätigen</button>
								<button type="button" class="button" onclick="$.fn.Raidplanner().changeLeadingStatus('<?php echo $this->item->id; ?>', 'waiting')">Warteposition</button>
								<button type="button" class="button" onclick="$.fn.Raidplanner().changeLeadingStatus('<?php echo $this->item->id; ?>', 'refused')">Nicht dabei</button>
							</td>
						</tr>
					</tfoot>
					<?php endif; ?>
				</table>
			</form>
		</div>
	</div>
</div>