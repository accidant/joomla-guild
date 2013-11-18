<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tooltip');
?>
<div class="profile<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<h1>
			<?php echo $this->escape($this->params->get('page_heading')); ?> von <?php echo $this->data->username; ?>
		</h1>
	<?php endif; ?>

	<div class="profile-left">
		<?php echo $this->loadTemplate('left'); ?>
	</div>

	<?php echo $this->loadTemplate('core'); ?>

	<table class="tabs">
		<tbody>
			<tr>
				<?php foreach($this->tabs as $key => $tab): ?>
				<th id="tab-<?php echo $key; ?>">
					<?php echo $key; ?>
				</th>
				<?php endforeach; ?>
			</tr>
		</tbody>
	</table>
	<div class="tabs-content">
		<?php foreach($this->tabs as $key => $content): ?>
			<div id="content-<?php echo $key; ?>" class="content">
				<a style="height: 1px;line-height: 1px;" name="<?php echo $key; ?>">&nbsp;</a>
				<?php echo $content; ?>
			</div>
		<?php endforeach; ?>
	</div>

	<?php if (JFactory::getUser()->id == $this->data->id) : ?>
		<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id='.(int) $this->data->id);?>">
			<?php echo JText::_('COM_USERS_Edit_Profile'); ?></a>
	<?php endif; ?>

	<script type="text/javascript">
		$('.tabs').find("th").click(function(){
			var attr = $(this).attr("id");
			attr = attr.replace("tab", "content");

			$('.tabs-content').find('.current').removeClass("current");
			$('#'+attr).addClass('current');

			$('.tabs').find('.open').removeClass('open');
			$(this).addClass('open');
		});

		var hash = window.location.hash.substr(1);
		if(hash != "")
		{
			$('.tabs').find('#tab-'+hash).click();
		}else{
			$('.tabs').find('th').first().click();
		}


	</script>
</div>
