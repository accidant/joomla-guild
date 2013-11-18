<?php
/**
 * FILE edit.php
 *
 * Date: 09.10.13
 * Time: 11:35
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JHtml::_("behavior.tooltip");
?>

<form action="" method="post" name="adminForm" id="adminForm" >
	<fieldset class="adminForm">
		<legend><?php echo JText::_("COM_PUNISHMENT_PUNISHMENT_DETAILS"); ?></legend>
		<ul class="adminformlist">
			<?php foreach($this->form->getFieldset() as $field): ?>
				<li><?php echo $field->label; echo $field->input; ?></li>
			<?php endforeach; ?>
		</ul>
	</fieldset>
	<div>
		<input type="hidden" name="task" value="punishment.edit" />
		<?php echo JHtml::_("form.token"); ?>
	</div>
</form>
