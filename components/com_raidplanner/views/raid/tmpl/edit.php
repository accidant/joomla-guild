<?php
/**
 * Class ${NAME}
 *
 * Date: 13.09.13
 * Time: 14:46
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JHtml::_('behavior.tooltip');
?>

<div class="content-container">
	<h1>Raid</h1>

	<form action="<?php echo JRoute::_("index.php?option=com_raidplanner"); ?>" method="post" name="raidForm" id="raidForm">
		<fieldset>
			<?php foreach($this->form->getFieldset() as $field): ?>
				<div class="field <?php echo ($field->type == "Time" || ($field->type=="List" && $field->id != "jform_raid"))? "half": ""; ?>">
					<?php echo $field->label; echo $field->input; ?>
				</div>
			<?php endforeach; ?>
		</fieldset>
		<input type="hidden" name="task" value="raid.submit" />
		<?php echo JHtml::_("form.token"); ?>
		<div class="buttons">
			<button type="submit" name="submit" ><?php echo JText::_('Submit'); ?></button>
			<a class="button" href="<?php echo JRoute::_("index.php?option=com_raidplanner&view=raids"); ?>"><?php echo JText::_("Cancel"); ?></a>
		</div>
	</form>
</div>
