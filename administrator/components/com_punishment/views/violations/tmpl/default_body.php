<?php
/**
 * FILE default_body.php
 *
 * Date: 08.10.13
 * Time: 14:11
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<?php foreach($this->items as $i => $item): ?>
<tr>
	<td><?php echo JHtml::_("grid.id", $i, $item->id); ?></td>
	<td><?php echo $item->title; ?></td>
	<td><?php echo $item->points; ?></td>
</tr>
<?php endforeach; ?>