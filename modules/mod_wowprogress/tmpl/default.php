<?php
/**
 * Class ${NAME}
 *
 * Date: 09.09.13
 * Time: 15:00
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
JHTML::_('behavior.modal');
?>

<div id="wowranking">
	<h1>
		Wow-Progress
	</h1>
	<p class="guild"><a href="http://www.wowprogress.com/guild/eu/dun-morogh/Der+schmale+Grat">Der schmale Grat:</a></p>
	<ul>
		<li class="<?php echo $world; ?>"><a href="http://www.wowprogress.com/"><span class="world">West:</span><?php echo $params->ranking->world_rank; ?></a></li>
		<li class="<?php echo $west; ?>"><a href="http://www.wowprogress.com/pve/eu"><span class="west">EU:</span> <?php echo $params->ranking->area_rank; ?></a></li>
		<li class="<?php echo $realm; ?>"><a href="http://www.wowprogress.com/pve/eu/dun-morogh"><span class="realm">Realm:</span> <?php echo $params->ranking->realm_rank; ?></a></li>
	</ul>
</div>