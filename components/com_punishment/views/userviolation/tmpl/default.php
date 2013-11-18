<?php
/**
 * FILE default.php
 *
 * Date: 11.11.13
 * Time: 10:27
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JHtml::_('behavior.tooltip');
?>

<div class="content-container">
	<h1>Strafpunkte verteilen</h1>
	<form action="<?php echo JRoute::_('index.php?option=com_punishment'); ?>" method="post" name="violationForm" id="violationForm">
		<fieldset>
			<?php foreach($this->form->getFieldset() as $field): ?>
				<div class="field">
					<?php echo $field->label; echo $field->input; ?>
				</div>
			<?php endforeach; ?>
		</fieldset>
		<input type="hidden" name="task" value="userviolation.submit" />
		<?php echo JHtml::_("form.token"); ?>
		<div class="buttons">
			<button type="submit" name="submit" ><?php echo JText::_("Submit"); ?></button>
			<a class="button" href="<?php echo JRoute::_("index.php?option=com_punishment&view=users"); ?>"><?php echo JText::_("Cancel"); ?></a>
		</div>
	</form>
</div>