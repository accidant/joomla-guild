<?php
/**
 * Kunena Component
 * @package Kunena.Template.Blue_Eagle
 * @subpackage Topic
 *
 * @copyright (C) 2008 - 2013 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>
<table class="<?php echo $this->class ?>">
	<tbody>
		<tr>
			<td colspan="3" class="kmeta-left">
				<span class="kmsg-id-left">
					<a id="<?php echo intval($this->message->id) ?>"></a>
					<?php echo $this->numLink ?>
				</span>
				<span class="kmsgdate kmsgdate-left" title="<?php echo KunenaDate::getInstance($this->message->time)->toKunena('config_post_dateformat_hover') ?>">
					<?php echo KunenaDate::getInstance($this->message->time)->toKunena('config_post_dateformat') ?>
				</span>
			</td>
		</tr>
		<tr>
			<td rowspan="2" class="kprofile-left">
				<?php $this->displayMessageProfile('vertical') ?>
			</td>
			<td class="kmessage-left">
				<?php $this->displayMessageContents() ?>
			</td>
		</tr>
		<tr class="kmessage-left-footer">
			<td colspan="2">
				<?php $this->displayMessageActions() ?>
			</td>
		</tr>
	</tbody>
</table>

<!-- Begin: Message Module Position -->
<?php $this->displayModulePosition('kunena_msg_' . $this->mmm) ?>
<!-- Finish: Message Module Position -->
