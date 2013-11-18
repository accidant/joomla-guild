<?php // no direct access

/**
 * @package Module WoW Boss for Joomla! 3
 * @version $Id: MOD_WOWBOSSPANDARIA.php 2013-02-28 Tolrem $
 * @author Tolrem.net
 * @copyright (C) 2011- Tolrem.NET
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
**/

defined( '_JEXEC' ) or die( 'Restricted access' ); 


?>

<div class="wowboss-wrapper clearfix <?php if ($wrapper == "1"){?>wbwon<?php } ?> <?php if ($wrappershadow == "1"){?>wbshadow<?php } ?>" style="background-color:<?php echo $wrappercolor; ?>">

<div class="wowbosspandaria" style="font-family:<?php echo $contentfont; ?>, Helvetica, Arial, sans-serif;">

	<?php if ($orgrimmar == "1" || $orgrimmar == "2" || $orgrimmar == "3"){ 	?>	
	<!--Siege of Orgrimmar-->
	<div class="wboss-box orgrimmar <?php if ($toggleorgrimmar == "1"){ ?>active <?php } ?><?php if ($mouseover == "1"){ ?>hoverable <?php } ?>">
		<header <?php if ($progressbar == "0"){ ?>class="noprogress"<?php } ?> <?php if ($orgrimmar == "3"){?>title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_FLEXIBLE'); ?>"<?php } ?>>
			<div class="headerok"></div>
			<h4 class="wboss-raidtitle" style="font-family:<?php echo $titlesfont; ?>, Helvetica, Arial, sans-serif;"><span class="<?php if ($orgrimmar == "1"){?>ten<?php } else if ($orgrimmar == "2"){?>twentyfive<?php } else if ($orgrimmar == "3"){?>flexible<?php } ?>"><?php echo JText::_('MOD_WOWBOSSPANDARIA_SIEGE_OF_ORGRIMMAR'); ?></span></h4>
			<div class="wb-progress"><span class="wb-ok"></span><span class="wb-okhero"></span></div>
		</header>

		<ul class="clearfix">
		<!--immerseus-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_IMMERSEUS'); ?>" class="<?php if ($immerseus == "1"){ ?> wboss-defeated <?php } else if ($immerseus == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_IMMERSEUS'); ?></span>
			</li>
		<!--fallenprotectors-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_FALLEN_PROTECTORS'); ?>" class="<?php if ($fallenprotectors == "1"){ ?> wboss-defeated <?php } else if ($fallenprotectors == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_FALLEN_PROTECTORS'); ?></span>
			</li>
		<!--norushen-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_NORUSHEN'); ?>" class="<?php if ($norushen == "1"){ ?> wboss-defeated <?php } else if ($norushen == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_NORUSHEN'); ?></span>
			</li>
		<!--shaofpride-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_SHAOFPRIDE'); ?>" class="<?php if ($shaofpride == "1"){ ?> wboss-defeated <?php } else if ($shaofpride == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_SHAOFPRIDE'); ?></span>
			</li>
		<!--galakras-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_GALAKRAS'); ?>" class="<?php if ($galakras == "1"){ ?> wboss-defeated <?php } else if ($galakras == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_GALAKRAS'); ?></span>
			</li>
		<!--ironjuggernaut-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_IRON_JUGGERNAUT'); ?>" class="<?php if ($ironjuggernaut == "1"){ ?> wboss-defeated <?php } else if ($ironjuggernaut == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_IRON_JUGGERNAUT'); ?></span>
			</li>
		<!--darkshaman-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_DARK_SHAMAN'); ?>" class="<?php if ($darkshaman == "1"){ ?> wboss-defeated <?php } else if ($darkshaman == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_DARK_SHAMAN'); ?></span>
			</li>
		<!--nazgrim-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_NAZGRIM'); ?>" class="<?php if ($nazgrim == "1"){ ?> wboss-defeated <?php } else if ($nazgrim == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_NAZGRIM'); ?></span>
			</li>	
		<!--malkorok-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_MALKOROK'); ?>" class="<?php if ($malkorok == "1"){ ?> wboss-defeated <?php } else if ($malkorok == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_MALKOROK'); ?></span>
			</li>		
		<!--spoils-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_SPOILS_OF_PANDARIA'); ?>" class="<?php if ($spoils == "1"){ ?> wboss-defeated <?php } else if ($spoils == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_SPOILS_OF_PANDARIA'); ?></span>
			</li>
		<!--thok-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_THOK'); ?>" class="<?php if ($thok == "1"){ ?> wboss-defeated <?php } else if ($thok == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_THOK'); ?></span>
			</li>	
		<!--blackfuse-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_BLACKFUSE'); ?>" class="<?php if ($blackfuse == "1"){ ?> wboss-defeated <?php } else if ($blackfuse == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_BLACKFUSE'); ?></span>
			</li>
		<!--paragons-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_PARAGONS'); ?>" class="<?php if ($paragons == "1"){ ?> wboss-defeated <?php } else if ($paragons == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_PARAGONS'); ?></span>
			</li>	
		<!--garrosh-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_GARROSH'); ?>" class="<?php if ($garrosh == "1"){ ?> wboss-defeated <?php } else if ($garrosh == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_GARROSH'); ?></span>
			</li>

		</ul>

	</div>
	<?php } ?>	

	<?php if ($tot == "1" || $tot == "2"){ 	?>	
	<!--Throne of Thunder-->
	<div class="wboss-box tot <?php if ($toggletot == "1"){ ?>active <?php } ?><?php if ($mouseover == "1"){ ?>hoverable <?php } ?>">
		<header <?php if ($progressbar == "0"){ ?>class="noprogress"<?php } ?>>
			<div class="headerok"></div>
			<h4 class="wboss-raidtitle" style="font-family:<?php echo $titlesfont; ?>, Helvetica, Arial, sans-serif;"><span class="<?php if ($tot == "1"){?>ten<?php } else if ($tot == "2"){?>twentyfive<?php } ?>"><?php echo JText::_('MOD_WOWBOSSPANDARIA_THRONE_OF_THUNDER'); ?></span></h4>
			<div class="wb-progress"><span class="wb-ok"></span><span class="wb-okhero"></span></div>
		</header>

		<ul class="clearfix">
		<!--Jin'rokh the Breaker-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_JINROKH'); ?>" class="<?php if ($jinrokh == "1"){ ?> wboss-defeated <?php } else if ($jinrokh == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_JINROKH'); ?></span>
			</li>
		<!--Horridon-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_HORRIDON'); ?>" class="<?php if ($horridon == "1"){ ?> wboss-defeated <?php } else if ($horridon == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_HORRIDON'); ?></span>
			</li>
		<!--Council of Elders-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_ELDERS'); ?>" class="<?php if ($elders == "1"){ ?> wboss-defeated <?php } else if ($elders == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_ELDERS'); ?></span>
			</li>	
		<!--Tortos-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_TORTOS'); ?>" class="<?php if ($tortos == "1"){ ?> wboss-defeated <?php } else if ($tortos == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_TORTOS'); ?></span>
			</li>
		<!--Megaera-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_MEGAERA'); ?>" class="<?php if ($megaera == "1"){ ?> wboss-defeated <?php } else if ($megaera == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_MEGAERA'); ?></span>
			</li>		
		<!--Ji-kun-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_JIKUN'); ?>" class="<?php if ($jikun == "1"){ ?> wboss-defeated <?php } else if ($jikun == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_JIKUN'); ?></span>
			</li>
		<!--Durumu-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_DURUMU'); ?>" class="<?php if ($durumu == "1"){ ?> wboss-defeated <?php } else if ($durumu == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_DURUMU'); ?></span>
			</li>
		<!--Primordius-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_PRIMORDIUS'); ?>" class="<?php if ($primordius == "1"){ ?> wboss-defeated <?php } else if ($primordius == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_PRIMORDIUS'); ?></span>
			</li>
		<!--Dark Animus-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_ANIMUS'); ?>" class="<?php if ($animus == "1"){ ?> wboss-defeated <?php } else if ($animus == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_ANIMUS'); ?></span>
			</li>	
		<!--Iron Qon-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_IRONQON'); ?>" class="<?php if ($ironqon == "1"){ ?> wboss-defeated <?php } else if ($ironqon == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_IRONQON'); ?></span>
			</li>
		<!--Twin Consorts-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_TWINCONSORTS'); ?>" class="<?php if ($twinconsorts == "1"){ ?> wboss-defeated <?php } else if ($twinconsorts == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_TWINCONSORTS'); ?></span>
			</li>		
		<!--Lei Shen-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_LEISHEN'); ?>" class="<?php if ($leishen == "1"){ ?> wboss-defeated <?php } else if ($leishen == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_LEISHEN'); ?></span>
			</li>
		<!--Ra-den-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_RADEN'); ?>" class="<?php if ($raden == "1"){ ?> wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_RADEN'); ?></span>
			</li>	
			
		</ul>

	</div>
	<?php } ?>	

	<?php if ($hof == "1" || $hof == "2"){ 	?>	
	<!--Heart of Fear-->
	<div class="wboss-box hof <?php if ($togglehof == "1"){ ?>active <?php } ?><?php if ($mouseover == "1"){ ?>hoverable <?php } ?>">
		<header <?php if ($progressbar == "0"){ ?>class="noprogress"<?php } ?>>
			<div class="headerok"></div>
			<h4 class="wboss-raidtitle" style="font-family:<?php echo $titlesfont; ?>, Helvetica, Arial, sans-serif;"><span class="<?php if ($hof == "1"){?>ten<?php } else if ($hof == "2"){?>twentyfive<?php } ?>"><?php echo JText::_('MOD_WOWBOSSPANDARIA_HEART_OF_FEAR'); ?></span></h4>
			<div class="wb-progress"><span class="wb-ok"></span><span class="wb-okhero"></span></div>
		</header>

		<ul class="clearfix">
		<!--Zor'lok-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_ZORLOK'); ?>" class="<?php if ($zorlok == "1"){ ?> wboss-defeated <?php } else if ($zorlok == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_ZORLOK'); ?></span>
			</li>
		<!--Ta'yak-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_TAYAK'); ?>" class="<?php if ($tayak == "1"){ ?> wboss-defeated <?php } else if ($tayak == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_TAYAK'); ?></span>
			</li>
		<!--Garalon-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_GARALON'); ?>" class="<?php if ($garalon == "1"){ ?> wboss-defeated <?php } else if ($garalon == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_GARALON'); ?></span>
			</li>	
		<!--Mel'jarak-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_MELJARAK'); ?>" class="<?php if ($meljarak == "1"){ ?> wboss-defeated <?php } else if ($meljarak == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_MELJARAK'); ?></span>
			</li>
		<!--Un'sok-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_UNSOK'); ?>" class="<?php if ($unsok == "1"){ ?> wboss-defeated <?php } else if ($unsok == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_UNSOK'); ?></span>
			</li>		
		<!--Shek'zeer-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_SHEKZEER'); ?>" class="<?php if ($shekzeer == "1"){ ?> wboss-defeated <?php } else if ($shekzeer == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_SHEKZEER'); ?></span>
			</li>	
		</ul>

	</div>
	<?php } ?>	
	
	<?php if ($mogushan == "1" || $mogushan == "2"){ 	?>	
	<!--Mogu'shan Vaults-->
	<div class="wboss-box mogushan <?php if ($togglemogushan == "1"){ ?>active <?php } ?><?php if ($mouseover == "1"){ ?>hoverable <?php } ?>">
		<header <?php if ($progressbar == "0"){ ?>class="noprogress"<?php } ?>>
			<div class="headerok"></div>
			<h4 class="wboss-raidtitle" style="font-family:<?php echo $titlesfont; ?>, Helvetica, Arial, sans-serif;"><span class="<?php if ($mogushan == "1"){?>ten<?php } else if ($mogushan == "2"){?>twentyfive<?php } ?>"><?php echo JText::_('MOD_WOWBOSSPANDARIA_MOGUSHAN_VAULTS'); ?></span></h4>
			<div class="wb-progress"><span class="wb-ok"></span><span class="wb-okhero"></span></div>
		</header>

		<ul class="clearfix">
		<!--The Stone Guard-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_STONEGUARD'); ?>" class="<?php if ($stoneguard == "1"){ ?> wboss-defeated <?php } else if ($stoneguard == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_STONEGUARD'); ?></span>
			</li>
		<!--Feng the Accursed-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_FENG'); ?>" class="<?php if ($feng == "1"){ ?> wboss-defeated <?php } else if ($feng == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_FENG'); ?></span>
			</li>
		<!--Gara'jal the Spiritbinder-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_GARAJAL'); ?>" class="<?php if ($garajal == "1"){ ?> wboss-defeated <?php } else if ($garajal == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_GARAJAL'); ?></span>
			</li>	
		<!--The Spirit Kings-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_SPIRITKINGS'); ?>" class="<?php if ($spiritkings == "1"){ ?> wboss-defeated <?php } else if ($spiritkings == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_SPIRITKINGS'); ?></span>
			</li>
		<!--Elegon-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_ELEGON'); ?>" class="<?php if ($elegon == "1"){ ?> wboss-defeated <?php } else if ($elegon == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_ELEGON'); ?></span>
			</li>		
		<!--Will of the Emperor-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_EMPEROR'); ?>" class="<?php if ($emperor == "1"){ ?> wboss-defeated <?php } else if ($emperor == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_EMPEROR'); ?></span>
			</li>	
		</ul>

	</div>
	<?php } ?>	
	
	<?php if ($terrace == "1" || $terrace == "2"){ 	?>	
	<!--Terrace of Endless Spring-->
	<div class="wboss-box terrace <?php if ($toggleterrace == "1"){ ?>active <?php } ?><?php if ($mouseover == "1"){ ?>hoverable <?php } ?>">
		<header <?php if ($progressbar == "0"){ ?>class="noprogress"<?php } ?>>
			<div class="headerok"></div>
			<h4 class="wboss-raidtitle" style="font-family:<?php echo $titlesfont; ?>, Helvetica, Arial, sans-serif;"><span class="<?php if ($terrace == "1"){?>ten<?php } else if ($terrace == "2"){?>twentyfive<?php } ?>"><?php echo JText::_('MOD_WOWBOSSPANDARIA_TERRACE_OF_ENDLESS_SPRING'); ?></span></h4>
			<div class="wb-progress"><span class="wb-ok"></span><span class="wb-okhero"></span></div>
		</header>

		<ul class="clearfix">
		<!--Protectors of the Endless-->
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_PROTECTORS'); ?>" class="<?php if ($protectors == "1"){ ?> wboss-defeated <?php } else if ($protectors == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_PROTECTORS'); ?></span>
			</li>
		<!--Tsulong-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_TSULONG'); ?>" class="<?php if ($tsulong == "1"){ ?> wboss-defeated <?php } else if ($tsulong == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_TSULONG'); ?></span>
			</li>
		<!--Lei Shi-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_LEISHI'); ?>" class="<?php if ($leishi == "1"){ ?> wboss-defeated <?php } else if ($leishi == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> even">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_LEISHI'); ?></span>
			</li>	
		<!--Sha of Fear-->	
			<li title="<?php echo JText::_('MOD_WOWBOSSPANDARIA_SHAOFFEAR'); ?>" class="<?php if ($shaoffear == "1"){ ?> wboss-defeated <?php } else if ($shaoffear == "2"){ ?>wboss-defeated wboss-defeated-hero <?php } ?> odd">
				<span class="wboss-bossname"><?php echo JText::_('MOD_WOWBOSSPANDARIA_SHAOFFEAR'); ?></span>
			</li>
		</ul>

	</div>
	<?php } ?>	
	
	
	
	
	<script>

		// Toggle //
	
		
	
	

		$('.wboss-box').each(function(){
	
			if($(this).hasClass("active")) {
			
				$(this).children('header').toggle(function() {
					$(this).parent('.wboss-box').removeClass("active");
				}, function() {
					$(this).parent('.wboss-box').addClass("active");
				});
				
			} else {
			
				$(this).children('header').toggle(function() {
					$(this).parent('.wboss-box').addClass("active");
				}, function() {
					$(this).parent('.wboss-box').removeClass("active");
				});
				
			}
			
		});
		
	</script>
<?php if ($progressbar == "1"){ ?>
	<script>	
	
	$('.wboss-box').each(function(){
	
		// Progress Bar //
	
		var totalbosses = $(this).children('ul').children('li').length;
		var defeatedbosses = $(this).children('ul').children('li.wboss-defeated').length;
		var defeatedbosseshero = $(this).children('ul').children('li.wboss-defeated-hero').length;
		
		var progresswidth = ( defeatedbosses / totalbosses ) * 100 + "%";
		var progresswidthhero = ( defeatedbosseshero / totalbosses ) * 100 + "%";
		
		$(this).children('header').children('.wb-progress').children('.wb-ok').css("width", progresswidth);
		$(this).children('header').children('.wb-progress').children('.wb-okhero').css("width", progresswidthhero);
		$(this).children('header').children('.headerok').css("width", progresswidth);
	
		
    });
	
	

	</script>
<?php } ?>	
</div>
</div>