<?php
/**
 * FILE default_foot.php
 *
 * Date: 07.11.13
 * Time: 14:44
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JHtml::_("behavior.tooltip");
JHTML::_('behavior.formvalidation');
?>
<div class="content-container">
	<h1>Strafsystem</h1>

	<form action="<?php echo JRoute::_("index.php?option=com_punishment"); ?>" method="post" name="usersTable" id="adminForm">
		<table>
			<thead><?php echo $this->loadTemplate("head"); ?></thead>
			<tbody><?php echo $this->loadTemplate("body"); ?></tbody>
			<tfoot><?php echo $this->loadTemplate("foot"); ?></tfoot>
		</table>
		<div>
			<input type="hidden" name="boxchecked" value="0" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
		<div>
			<?php if($this->canDo->get("userviolation.add")): ?>
				<a class="button" style="float:right;" href="<?php echo JRoute::_("index.php?option=com_punishment&task=userviolation.add"); ?>"><?php echo JText::_("COM_PUNISHMENT_ADD_VIOLATION"); ?></a>
			<?php endif; ?>
		</div>
	</form>
</div>