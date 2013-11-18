<?php
/**
 * Class ${NAME}
 *
 * Date: 13.09.13
 * Time: 13:50
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<!--<tr>
	<td colspan="5"><?php echo $this->pagination->getListFooter(); ?></td>
</tr>-->
<tr>
	<?php if($this->canDo->get("core.edit")): ?>
		<td colspan="8">
	<?php else: ?>
	<td colspan="7">
	<?php endif; ?>
		<?php echo $this->loadTemplate("actions"); ?>
	</td>
</tr>