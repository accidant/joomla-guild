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
JLoader::import('wowchars', JPATH_ROOT . DS . 'components' . DS . 'com_wowchars' . DS . 'helpers' );

?>

<div class="wowchars">
	<div id="main-char">
		<?php foreach($wowchars as $char): ?>
			<?php if($char['main']): ?>
				<div class="wowchar main">
					<input type="hidden" name="char_id" class="char_id" value="<?php echo $char['id']; ?>" />
					<div class="avatar <?php echo strtolower(WowCharsHelperWowChars::getFaction($char['race'])); ?>">
						<img src="<?php echo $host . $char['image']; ?>" />
					</div>
					<div class="stats">
						<p class="charname <?php echo strtolower(WowCharsHelperWowChars::getClass($char['class'])); ?>"><?php echo $char['charname']; ?> &nbsp; <span class="select-chars">&nbsp;</span></p>
						<p class="guild"><?php echo $char['guild']; ?></p>
						<div class="speccs">
							<?php
								$specc1 = WowCharsHelperWowChars::getSpeccImage($char['specc_1_role']);
								$specc2 = WowCharsHelperWowChars::getSpeccImage($char['specc_2_role']);
								if($specc1 != ""){
									$specc1 = $spec. $specc1;
								}
								if($specc2 != ""){
									$specc2 = $spec. $specc2;
								}
							?>
							<?php if($specc1 != ""): ?>
								<img class="roles" src="<?php echo $specc1; ?>" />
							<?php endif; if($specc2 != ""): ?>
								<img class="roles" src="<?php echo $specc2; ?>" />
							<?php endif; ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<div id="alts">
		<?php foreach($wowchars as $char): ?>
			<?php if(!$char['main']): ?>
				<div class="wowchar alts">
					<input type="hidden" name="char_id" class="char_id" value="<?php echo $char['id']; ?>" />
					<div class="avatar <?php echo strtolower(WowCharsHelperWowChars::getFaction($char['race'])); ?>">
						<img src="<?php echo $host . $char['image']; ?>" />
					</div>
					<div class="stats">
						<p class="charname <?php echo strtolower(WowCharsHelperWowChars::getClass($char['class'])); ?>"><?php echo $char['charname']; ?> &nbsp; <span class="select-chars"></span></p>
						<p class="guild"><?php echo $char['guild']; ?></p>
						<div class="speccs">
							<?php
							$specc1 = WowCharsHelperWowChars::getSpeccImage($char['specc_1_role']);
							$specc2 = WowCharsHelperWowChars::getSpeccImage($char['specc_2_role']);
							if($specc1 != ""){
								$specc1 = $spec. $specc1;
							}
							if($specc2 != ""){
								$specc2 = $spec. $specc2;
							}
							?>
							<?php if($specc1 != ""): ?>
								<img class="roles" src="<?php echo $specc1; ?>" width="24px" height="24px" />
							<?php endif; if($specc2 != ""): ?>
								<img class="roles" src="<?php echo $specc2; ?>" width="24px" height="24px"/>
							<?php endif; ?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
<div class="clearfix"></div>

<a class="modal" rel="{handler: 'iframe', size: {x: 370, y: 180}}" href="<?php echo JRoute::_('index.php?option=com_wowchars&tmpl=component&view=addchar&id=' . $params->user->id); ?>" ><?php echo JText::_('COM_WOWCHARS_NEW_CHAR'); ?></a>
<div class="clearfix"></div>

<script type="text/javascript">
	(function($){
		var toggleSelection = function(){
			if($('#alts').hasClass("open")){
				$('#alts').fadeOut("slow", function(){
					$('#alts').removeClass('open').addClass("closed");
				});

			}else{
				$('#alts').fadeIn("slow", function(){
					$('#alts').removeClass('closed').addClass("open");
				});
			}
		}

		$('.select-chars').click(toggleSelection);

		/*$("#alts").mouseleave(function(){
			setTimeout(function(){
				$('#alts').fadeToggle();
			},1000);
		})*/

		$(document).click(function(e){
			if($('#alts').hasClass("open")){
				$('#alts').fadeOut("slow", function(){
					$('#alts').removeClass('open').addClass("closed");
				});
			}
		})

		$("#alts").on("click",".alts", function(){
			var current = $(".wowchars #main-char").find('.wowchar');

			var current_main_id = $('.wowchar.main').find('.char_id').val();
			var new_main_id = $(this).find('.char_id').val();

			$.ajax({
				url: "<?php echo JRoute::_("index.php?option=com_wowchars", true); ?>",
				data: {
					task: "updateMainChar",
					old_main: current_main_id,
					new_main: new_main_id
				},
				dataType: "JSON",
				type: "POST",
				success: $.proxy(function(data){
					$(this).fadeOut("slow", function(){
						$(this).find("img.roles").removeAttr('width').removeAttr('height');
						$(".wowchars #main-char").append(this);
						$(this).find('.select-chars').click(toggleSelection);
						$(this).removeClass("alts").addClass("main");

						$.event.trigger({
							type: "mainCharChanged"
						});

						$(this).fadeIn("slow", function(){
							//$('#alts').fadeToggle("slow");
						});
					});
					$(current).fadeOut("slow", function(){
						$(this).remove();
						$(".wowchars #alts").append(this);
						$(this).find("img.roles").attr('width', "24px").attr('height', "24px");
						$(this).removeClass("main").addClass("alts");
						$(this).fadeIn("slow");
					});
				}, this)
			});

		})
	})(jQuery);
</script>
