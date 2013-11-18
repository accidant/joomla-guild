<?php
/**
 * Class ${NAME}
 *
 * Date: 09.07.13
 * Time: 15:20
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JHtml::_('behavior.tooltip');
?>
<form action="<?php echo JRoute::_('index.php?option=com_helloworld'); ?>" method="post" name="adminForm" >
	<table class="adminList">
		<thead><?php echo $this->loadTemplate("head"); ?></thead>
		<tfoot><?php echo $this->loadTemplate("foot"); ?></tfoot>
		<tbody><?php echo $this->loadTemplate("body"); ?></tbody>
	</table>
	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
