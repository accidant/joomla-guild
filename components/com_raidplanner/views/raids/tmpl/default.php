<?php
/**
 * Class ${NAME}
 *
 * Date: 13.09.13
 * Time: 13:28
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JHtml::_("behavior.tooltip");
JHTML::_('behavior.formvalidation');
?>
<div class="content-container">
<h1>Raidplaner</h1>
	<?php echo $this->loadTemplate("intro"); ?>

	<form action="<?php echo JRoute::_("index.php?option=com_raidplanner"); ?>" method="post" name="raidTable" id="adminForm">
		<table class="wowraids">
			<thead><?php echo $this->loadTemplate("head"); ?></thead>
			<tbody><?php echo $this->loadTemplate("body"); ?></tbody>
			<tfoot><?php echo $this->loadTemplate("foot"); ?></tfoot>
		</table>
		<div>
			<input type="hidden" name="boxchecked" value="0" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>
<div id="current_raid"></div>


<script type="text/javascript">
	(function($){
		var Raidplanner = $.fn.Raidplanner("<?php echo JRoute::_("index.php?option=com_raidplanner", true); ?>");

		$('.wowraids tbody').find("tr").click(function(){
			Raidplanner.showRaid($(this));
		});

		$(document).on("mainCharChanged", function(event){
			Raidplanner.updateRaidTable();
		})



	})(jQuery)
</script>