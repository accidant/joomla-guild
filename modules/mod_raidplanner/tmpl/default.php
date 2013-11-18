<?php
/**
 * Class ${NAME}
 *
 * Date: 16.09.13
 * Time: 10:54
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<div class="right-box">
	<div class="header">
		<h1>Events</h1>
	</div>
	<div class="content" style="padding: 0;">
		<?php if(\count($params->raids) != 0): ?>
			<table>
				<?php foreach($params->raids as $raid): ?>
					<tr>
						<td class="event_icon"><img src="http://placehold.it/32x32"/></td>
						<td><?php echo $raid['name']; ?></td>
						<td>STATUS</td>
					</tr>
				<?php endforeach ?>
			</table>
		<?php else: ?>
			<p class="empty-result">Keine austehenden Events</p>
		<?php endif; ?>
	</div>
</div>