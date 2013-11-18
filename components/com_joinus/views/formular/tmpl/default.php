<?php
/**
 * Class ${NAME}
 *
 * Date: 11.07.13
 * Time: 14:46
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JHtml::_('behavior.tooltip');
?>
<div class="content-container">
	<form action="<?php JRoute::_('index.php'); ?>" method="post" name="formular">
		<fieldset class="contact-form">
			<h1><?php echo JText::_('COM_JOINUNS_FORMULAR_DETAILS'); ?></h1>
			<?php foreach($this->form->getFieldset('joinus-formular') as $field):?>
				<div class="formelm"><?php echo $field->label; echo $field->input; ?></div>
			<?php endforeach; ?>
			<div class="clearfix"></div>
			<div class="buttons"><input type="submit" name="submit" value="<?php echo JText::_('Submit'); ?>" /></div>
		</fieldset>

		<div>
			<input type="hidden" name="option" value="com_joinus" />
			<input type="hidden" name="task" value="joinus.submit" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>