<?php
/**
 * @package		Joomla.Site
 * @subpackage	Templates.beez5
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Create a shortcut for params.
$canEdit	= $this->item->params->get('access-edit');
$params = &$this->item->params;
$images = json_decode($this->item->images);
$app = JFactory::getApplication();
$templateparams =$app->getTemplate(true)->params;

/*if ($templateparams->get('html5')!=1)
{
	require JPATH_BASE.'/components/com_content/views/featured/tmpl/default_item.php';
	//evtl. ersetzen durch JPATH_COMPONENT.'/views/...'
} //else {*/
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
?>

<?php if ($this->item->state == 0) : ?>
<div class="system-unpublished">
<?php endif; ?>
<?php if ($params->get('show_title')) : ?>
	<h1>
		<?php if ($params->get('link_titles') && $params->get('access-view')) : ?>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid)); ?>">
			<?php echo $this->escape($this->item->title); ?></a>
		<?php else : ?>
			<?php echo $this->escape($this->item->title); ?>
		<?php endif; ?>
	</h1>
<?php endif; ?>

<?php if (!$params->get('show_intro')) : ?>
	<?php echo $this->item->event->afterDisplayTitle; ?>
<?php endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php // to do not that elegant would be nice to group the params ?>

<div class="note">
    <?php $author =  $this->item->author; ?>
    <?php $author = ($this->item->created_by_alias ? $this->item->created_by_alias : $author);?>

   <span class="date"><?php echo JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC2')); ?></span>  von <span class="author"><?php echo JText::_($author); ?></span>

	<?php if ($params->get('show_print_icon') || $params->get('show_email_icon') || $canEdit) : ?>
		<ul class="actions">
			<?php if ($params->get('show_print_icon')) : ?>
				<li class="print">
					<?php echo JHtml::_('icon.print_popup', $this->item, $params); ?>
				</li>
			<?php endif; ?>
			<?php if ($params->get('show_email_icon')) : ?>
				<li class="email">
					<?php echo JHtml::_('icon.email', $this->item, $params); ?>
				</li>
			<?php endif; ?>

			<?php if ($canEdit) : ?>
				<li class="edit">
					<?php echo JHtml::_('icon.edit', $this->item, $params); ?>
				</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>

<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
	<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
	<div class="img-intro-<?php echo htmlspecialchars($imgfloat); ?>">
	<img
		<?php if ($images->image_intro_caption):
			echo 'class="caption"'.' title="' .htmlspecialchars($images->image_intro_caption) .'"';
		endif; ?>
		src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo htmlspecialchars($images->image_intro_alt); ?>"
		width="150px"
		height="130px"
		/>
	</div>
<?php endif; ?>

<?php echo $this->item->introtext; ?>

<?php if ($params->get('show_readmore') && $this->item->readmore) :
	if ($params->get('access-view')) :
		$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
	else :
		$menu = JFactory::getApplication()->getMenu();
		$active = $menu->getActive();
		$itemId = $active->id;
		$link1 = JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId);
		$returnURL = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
		$link = new JURI($link1);
		$link->setVar('return', base64_encode(urlencode($returnURL)));
	endif;
?>

	<a class="readmore lsf-icon right" href="<?php echo $link; ?>">
		<?php if (!$params->get('access-view')) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
				echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?></a>
<?php endif; ?>

<?php if ($this->item->state == 0) : ?>
</div>
<?php endif; ?>

<div class="clearfix"></div>
<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent; ?>

<?php// } ?>
