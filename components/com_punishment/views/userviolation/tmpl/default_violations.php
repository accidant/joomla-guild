<?php
/**
 * FILE default_violations.php
 *
 * Date: 11.11.13
 * Time: 15:26
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
$sum_points = 0;
?>

<h1>Vergehen</h1>
<table>
	<thead>
		<tr>
			<th>Art</th>
			<th>Datum</th>
			<th>Strafpunkte</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($this->violations) > 0) : ?>
			<?php foreach($this->violations as $violation): ?>
				<tr <?php echo ($violation['expired'])? 'style="color: #5F4D3E;/*text-decoration:line-through*/"': ''; ?>>
					<td><?php echo $violation['title']; ?></td>
					<td><?php echo JHtml::date($violation['violation_date'], "d.m.Y"); ?></td>
					<td><?php echo $violation['points']; ?></td>
					<td style="text-decoration: none;">
						<?php
							if($violation['redemption_date'])
							{
								echo "Freikauf am: " . JHtml::date($violation['redemption_date'], "d.m.Y");
							}elseif($violation['expired'])
							{
								echo "Ausgelaufen";
							}
						?>
					</td>
				</tr>
				<?php $sum_points += (!$violation['expired'])? $violation['points']: 0; ?>
			<?php endforeach; ?>
		<?php else: ?>
			<tr>
				<td colspan="4" class="empty-result">Keine Vergehen vorhanden</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table>
<div style="padding:10px;" class="clearfix"></div>
<h1>Strafe</h1>
<table>
	<thead>
		<tr>
			<th>Strafe</th>
			<th>Erhalten</th>
			<th>Zeitraum</th>
		</tr>
	</thead>
	<tbody>
	<?php if(count($this->punishments) > 0) : ?>
		<?php foreach($this->punishments as $punishment): ?>
			<tr <?php echo ($punishment['expired'])? 'style="color: #5F4D3E;text-decoration:line-through"': ''; ?>>
				<td><?php echo $punishment['title'] . " [" . $punishment['duration'] . " Woche(n)]"; ?></td>
				<td><?php echo JHtml::date($punishment['punishment_date'], "d.m.Y"); ?></td>
				<?php
					$starting = new DateTime($punishment['punishment_date']);
					$starting->add(DateInterval::createFromDateString('next Wednesday'));
					$ending = new DateTime($punishment['punishment_date']);
					$ending->add(DateInterval::createFromDateString("next Wednesday"));
					$ending->add(DateInterval::createFromDateString("+" . $punishment['duration'] . " Week"));
				?>
				<td><?php echo JHtml::date($starting->format('Y-m-d'), "d.m.Y") . " - " . JHtml::date($ending->format('Y-m-d'), "d.m.Y")?></td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr>
			<td colspan="4" class="empty-result">Keine Strafen vorhanden</td>
		</tr>
	<?php endif; ?>
	</tbody>
</table>
<div style="padding:10px;" class="clearfix"></div>
<h1>Freikauf</h1>
<p>Derzeitige Kosten pro Punkt: <?php echo $this->redemption_cost; ?> Gold</p>
<p>Derzeitige Kosten für Freikaufen: <strong><?php echo $sum_points * $this->redemption_cost; ?> Gold</strong></p>
<?php if($this->canDo->get("userviolation.deRedemption")): ?>
	<?php if($sum_points == 0): ?>
		<button disabled="disabled"><Freigekauft></Freigekauft></button>
	<?php else: ?>
		<a  class="button" href="<?php echo JRoute::_('index.php?option=com_punishment&task=userviolation.doRedemption&user_id='.$this->user->id); ?>">Freigekauft</a>
	<?php endif; ?>
<?php endif; ?>
