<?php
/**
 * FILE default_body.php
 *
 * Date: 07.11.13
 * Time: 14:44
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<?php foreach($this->items as $item): ?>
<tr style="font-size: 1.1em;">
	<td><a href="<?php echo JRoute::_("index.php?option=com_users&view=profile&user_id=$item->id#Strafen"); ?>"><?php echo $item->name; ?></a></td>
	<td style="text-align: center">
		<span class="violation-level-<?php echo ($item->current_points >= 10)? "high": ($item->current_points >= 7)? "mid" : ($item->current_points >= 4)? "low" : "none" ;?>">
		<?php echo ($item->current_points)? $item->current_points: 0; ?>
		</span>
	</td>
	<td><?php echo ($item->last_violation)? JHtml::date($item->last_violation, "d.m.Y"): "Keine"; ?></td>

	<?php
		$punishment = "Keine";
		if($item->title){
			$starting = new DateTime($item->punishment_date);
			$starting->add(DateInterval::createFromDateString("next Wednesday"));
			$ending = new DateTime($item->punishment_date);
			$ending->add(DateInterval::createFromDateString("next Wednesday"));
			$ending->add(DateInterval::createFromDateString("+".$item->duration." Week"));
			$punishment = $item->title ." [" . $item->duration . " Woche(n)]<br />Dauer: ".
						JHtml::date($starting->format('Y-m-d'), "d.m.Y") . " - " . JHtml::date($ending->format('Y-m-d'), "d.m.Y");
		}
	?>
	<td><?php echo $punishment; ?></td>
	<td><?php echo ($item->reset_date)? JHtml::date($item->reset_date, "d.m.Y") : "-"; ?></td>
</tr>
<?php endforeach; ?>