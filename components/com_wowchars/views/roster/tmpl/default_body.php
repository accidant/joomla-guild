<?php
/**
 * FILE default_body.php
 *
 * Date: 01.10.13
 * Time: 14:35
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<?php foreach($this->chars as $char): ?>
<?php
$spec = WowCharsHelperWowChars::$specc_image_host;

$specc1 = WowCharsHelperWowChars::getSpeccImage($char->specc_1_role);
$specc2 = WowCharsHelperWowChars::getSpeccImage($char->specc_2_role);
if($specc1 != ""){
	$specc1 = $spec. $specc1;
}
if($specc2 != ""){
	$specc2 = $spec. $specc2;
}
?>
<tr>
	<td><img src="<?php echo WowCharsHelperWowChars::$static_host . $char->image; ?>" /></td>
	<td style="vertical-align: top;">
		<span class="<?php echo strtolower(WowCharsHelperWowChars::getClass($char->class)); ?>"><strong><?php echo $char->charname; ?></strong></span> (<?php echo $char->charlevel; ?>)
	</td>
	<td>RACE</td>
	<td>LEVEL</td>
	<td>STATUS (MAIN/TWINK)</td>
	<td>
		<?php if($specc1 != ""): ?>
			<img class="roles" src="<?php echo $specc1; ?>" /> <?php echo $char->specc_1_name; ?>
		<?php endif; ?>
	</td>
	<td>
		<?php if($specc2 != ""): ?>
			<img class="roles" src="<?php echo $specc2; ?>" /> <?php echo $char->specc_2_name; ?>
		<?php endif; ?>
	</td>
</tr>
<?php endforeach; ?>