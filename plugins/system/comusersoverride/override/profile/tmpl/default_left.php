<?php
/**
 * FILE default_left.php
 *
 * Date: 11.10.13
 * Time: 17:04
 * @author Thomas Joußen <tjoussen@databay.de>
 */
?>
<div class="avatar">
	<img src="<?php echo $this->data->profile['avatar']; ?>" />
</div>
<dl>
	<dt>
		<?php echo JText::_('COM_USERS_PROFILE_REGISTERED_DATE_LABEL'); ?>
	</dt>
	<dd><?php echo JHtml::_('date', $this->data->registerDate); ?></dd>
	<dt>
		<?php echo JText::_('COM_USERS_PROFILE_LAST_VISITED_DATE_LABEL'); ?>
	</dt>

	<?php if ($this->data->lastvisitDate != '0000-00-00 00:00:00'){?>
		<dd>
			<?php echo JHtml::_('date', $this->data->lastvisitDate); ?>
		</dd>
	<?php } else {?>
		<dd>
			<?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
		</dd>
	<?php } ?>
</dl>