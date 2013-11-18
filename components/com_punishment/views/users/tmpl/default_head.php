<?php
/**
 * FILE default_head.php
 *
 * Date: 07.11.13
 * Time: 14:44
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<tr>
	<th><?php echo JText::_("COM_PUNISHMENT_USERS_NAME"); ?></th>
	<th width="45px"><?php echo JText::_("COM_PUNISHMENT_USERS_POINTS"); ?></th>
	<th><?php echo JText::_("COM_PUNISHMENT_USERS_LAST_VIOLATION"); ?></th>
	<th><?php echo JText::_("COM_PUNISHMENT_USERS_CURRENT_PUNISHMENT"); ?></th>
	<th><?php echo JText::_("COM_PUNISHMENT_USERS_RESET"); ?></th>
</tr>