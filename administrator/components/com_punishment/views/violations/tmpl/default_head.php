<?php
/**
 * FILE default_head.php
 *
 * Date: 08.10.13
 * Time: 14:11
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<tr>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="Joomla.checkAll(this);" />
	</th>
	<th>
		<?php echo JText::_("COM_PUNISHMENT_VIOLATION_TITLE"); ?>
	</th>
	<th>
		<?php echo JText::_("COM_PUNISHMENT_VIOLATION_POINTS"); ?>
	</th>
</tr>