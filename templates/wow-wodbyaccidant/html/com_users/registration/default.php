<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<div class="registration<?php echo $this->pageclass_sfx?>">
<?php if ($this->params->get('show_page_heading')) : ?>
	<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
<?php endif; ?>

	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
<?php foreach ($this->form->getFieldsets() as $fieldset): // Iterate through the form fieldsets and display each one.?>
	<?php $fields = $this->form->getFieldset($fieldset->name);?>
	<?php if (count($fields)):?>
		<fieldset>
		<?php foreach($fields as $field):// Iterate through the fields in the set and display them.?>
			<?php if ($field->hidden):// If the field is hidden, just display the input.?>
				<?php echo $field->input;?>
			<?php else:?>
				<div class="field">
					<?php if($field->type != 'Spacer' && $field->type != "Captcha"){
						echo $field->label;
						echo ($field->type!='Spacer') ? $field->input : "&#160;";
					}
					?>
				</div>
			<?php endif; ?>
		<?php endforeach;?>
		</fieldset>
	<?php endif;?>
<?php endforeach;?>
		<fieldset>
			<div class="field">
				<?php $fields = $this->form->getFieldset("default") ?>
				<?php
				foreach($fields as $field){
					if($field->type == "Captcha"){
						echo $field->label;
						echo $field->input;
					}
				}
				?>
			</div>
		</fieldset>
		<div class="buttons">
			<input type="submit" class="validate button" value="<?php echo JText::_('JREGISTER');?>" />
			<a class="button" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a>
			<input type="hidden" name="option" value="com_users" />
			<input type="hidden" name="task" value="registration.register" />
			<?php echo JHtml::_('form.token');?>
		</div>
		<div class="clearfix"></div>
	</form>
</div>
