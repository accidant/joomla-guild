<?php
/**
 * FILE default.php
 *
 * Date: 01.10.13
 * Time: 14:22
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

?>
<div class="content-container">
	<h1>Roster</h1>

	<?php foreach($this->items as $class => $chars): ?>
		<?php $this->chars = $chars; ?>
		<h2><span class="<?php echo strtolower(WowCharsHelperWowChars::getClass($class)); ?>"><?php echo WowCharsHelperWowChars::getClass($class); ?></span></h2>

		<table>
			<thead><?php echo $this->loadTemplate("head"); ?></thead>
			<tbody><?php echo $this->loadTemplate("body"); ?></tbody>
			<tfoot><?php echo $this->loadTemplate("foot"); ?></tfoot>
		</table>
	<?php endforeach; ?>
</div>