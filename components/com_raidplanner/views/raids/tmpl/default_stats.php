<?php
/**
 * FILE default_stats.php
 *
 * Date: 17.10.13
 * Time: 16:31
 * @author Thomas Joußen <tjoussen@databay.de>
 */
defined("_JEXEC") or die("Restricted Access");

JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );
?>

<table>
	<thead>
		<tr>
			<th>Charakter</th>
			<th>Aktuelle ID</th>
			<th>Letzten 4 Wochen</th>
			<th>Letzten 24 Wochen</th>
			<th>Gesamt</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->stats as $key => $stats): ?>
			<tr>
				<td><span class="<?php echo strtolower(WowCharsHelperWowChars::getClass($stats['class'])); ?>"><?php echo $stats['charname']; ?></span></td>
				<td><?php echo ($stats['current_id']['total'] > 0)? round($stats['current_id']['participated']/$stats['current_id']['total'], 4) * 100  . "%": "-" ?></td>
				<td><?php echo ($stats['last_month']['total'] > 0)? round($stats['last_month']['participated']/$stats['last_month']['total'], 4) * 100 . "%": "-" ?></td>
				<td><?php echo ($stats['half_year']['total'] > 0)? round($stats['half_year']['participated']/$stats['half_year']['total'], 4) * 100 . "%": "-" ?></td>
				<td><?php echo ($stats['overall']['total'] > 0)? round($stats['overall']['participated']/$stats['overall']['total'], 4) * 100 . "%": "-" ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>