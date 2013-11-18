<?php
/**
 * FILE default.php
 *
 * Date: 08.10.13
 * Time: 14:11
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JHtml::_("behavior.tooltip");
?>

<form action="<?php echo JRoute::_("index.php?option=com_punishment"); ?>" method="post" name="adminForm">
	<table class="adminlist">
		<thead><?php echo $this->loadTemplate("head"); ?></thead>
		<tbody><?php echo $this->loadTemplate("body"); ?></tbody>
		<tfoot><?php echo $this->loadTemplate("foot"); ?></tfoot>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_("form.token"); ?>
	</div>
</form>