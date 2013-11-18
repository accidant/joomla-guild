<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */
defined('_JEXEC') or die;

JLoader::register('JHtmlUsers', JPATH_COMPONENT . '/helpers/html/users.php');
JHtml::register('users.spacer', array('JHtmlUsers', 'spacer'));

$fieldsets = $this->form->getFieldsets();
if (isset($fieldsets['core']))   unset($fieldsets['core']);
if (isset($fieldsets['params'])) unset($fieldsets['params']);

$exclude = array(
	"avatar"
);

foreach ($fieldsets as $group => $fieldset): // Iterate through the form fieldsets
	$fields = $this->form->getFieldset($group);
	if (count($fields)):
?>
		<?php foreach ($fields as $field):
			if (!$field->hidden && !in_array($field->fieldname, $exclude)) :?>

				<?php
				$value = $field->value;
				?>
			<dt><?php echo $field->title; ?></dt>
			<dd>
				<?php if (JHtml::isRegistered('users.'.$field->id)):?>

					<?php echo JHtml::_('users.'.$field->id, $value);?>
				<?php elseif (JHtml::isRegistered('users.'.$field->fieldname)):?>
					<?php echo JHtml::_('users.'.$field->fieldname, $value);?>
				<?php elseif (JHtml::isRegistered('users.'.$field->type)):?>
					<?php echo JHtml::_('users.'.$field->type, $value);?>
				<?php else:?>
					<?php if ($field->fieldname == "gender"){
						echo JText::_($value);
					} else {
						echo JHtml::_('users.value', $value);
					}?>
				<?php endif;?>
			</dd>
			<?php endif;?>
		<?php endforeach;?>
	<?php endif;?>
<?php endforeach;?>
