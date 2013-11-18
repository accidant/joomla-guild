<?php
/**
 * @version SVN: $Id: mod_#module#.php 96 2012-09-21 Cmstyles.de $
 * @package    Klassensuche
 * @subpackage Base
 * @copyright    Copyright (C) 2012 Cmstyles.de
 * http://www.cmstyles.de
 * Module Cmprogress - Joomla! 2.5
 * @license  GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<div id="<?php echo mod_klassensuche_searchHelper::getModuleId($moduleName,$moduleId) ?>" class="<?php echo $params->get('moduleclass_sfx','');?>">
<link rel="stylesheet" href="<?php echo $modulePath ?>/tmpl/css/<?php echo $themeClass ?>" type="text/css" media="screen, projection" />

	  <?php if($warriorStatus){ ?>
	  <?php if($warriorStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="warrior">
        <div class="title"><?php echo JText::_('WARRIOR'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($warriorclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $warriorclass1 ?>"><?php endif; ?> 
		<?php if($warriorclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $warriorclass2 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($warriorStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($warriorInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
	  <?php if($paladinStatus){ ?>
	  <?php if($paladinStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="paladin">
        <div class="title"><?php echo JText::_('PALADIN'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($paladinclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $paladinclass1 ?>"><?php endif; ?> 
		<?php if($paladinclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $paladinclass2 ?>"><?php endif; ?> 
		<?php if($paladinclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $paladinclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($paladinStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($paladinInfo) ?> 
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>

	  <?php if($hunterStatus){ ?>
	  <?php if($hunterStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="hunter">
        <div class="title"><?php echo JText::_('HUNTER'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($hunterclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $hunterclass1 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($hunterStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($hunterInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
	
	<?php if($rogueStatus){ ?>
	<?php if($rogueStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="rogue">
        <div class="title"><?php echo JText::_('ROGUE'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($rogueclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $rogueclass1 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($rogueStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($rogueInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
    
		  <?php if($priestStatus){ ?>
		  <?php if($priestStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="priest">
        <div class="title"><?php echo JText::_('PRIEST'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($priestclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $priestclass1 ?>"><?php endif; ?> 
		<?php if($priestclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $priestclass2 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($priestStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($priestInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
	    
			<?php if($deathknightStatus){ ?>
			<?php if($deathknightStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="deathknight">
        <div class="title"><?php echo JText::_('DEATHKNIGHT'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($deathknightclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $deathknightclass1 ?>"><?php endif; ?> 
		<?php if($deathknightclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $deathknightclass2 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($deathknightStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($deathknightInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>	

			<?php if($shamanStatus){ ?>
			<?php if($shamanStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="shaman">
        <div class="title"><?php echo JText::_('SHAMAN'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($shamanclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $shamanclass1 ?>"><?php endif; ?> 
		<?php if($shamanclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $shamanclass2 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($shamanStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($shamanInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>	
    
			<?php if($mageStatus){ ?>
			<?php if($mageStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="mage">
        <div class="title"><?php echo JText::_('MAGE'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($mageclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $mageclass1 ?>"><?php endif; ?> 
		</div> 
	  <div class="info"><?php if($mageStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($mageInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
    
			<?php if($warlockStatus){ ?>
			<?php if($warlockStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="warlock">
        <div class="title"><?php echo JText::_('WARLOCK'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($warlockclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $warlockclass1 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($warlockStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($warlockInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>

			<?php if($monkStatus){ ?>
			<?php if($monkStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="monk">
        <div class="title"><?php echo JText::_('MONK'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($monkclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $monkclass1 ?>"><?php endif; ?> 
		<?php if($monkclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $monkclass2 ?>"><?php endif; ?> 
		<?php if($monkclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $monkclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($monkStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($monkInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>

			<?php if($druidStatus){ ?>
			<?php if($druidStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="druid">
        <div class="title"><?php echo JText::_('DRUID'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($druidclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $druidclass1 ?>"><?php endif; ?> 
		<?php if($druidclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $druidclass2 ?>"><?php endif; ?> 
		<?php if($druidclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $druidclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($druidStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($druidInfo) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($jedi_knightStatus){ ?>
	  <?php if($jedi_knightStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="jedi_knight">
        <div class="title"><?php echo JText::_('JEDI_KNIGHT'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($jedi_knightclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $jedi_knightclass1 ?>"><?php endif; ?> 
		<?php if($jedi_knightclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $jedi_knightclass2 ?>"><?php endif; ?> 
		<?php if($jedi_knightclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $jedi_knightclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($jedi_knightStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($jedi_knightInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($headhunterStatus){ ?>
	  <?php if($headhunterStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="headhunter">
        <div class="title"><?php echo JText::_('HEADHUNTER'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($headhunterclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $headhunterclass1 ?>"><?php endif; ?> 
		<?php if($headhunterclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $headhunterclass2 ?>"><?php endif; ?> 
		<?php if($headhunterclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $headhunterclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($headhunterStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($headhunterInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($sith_warriorStatus){ ?>
	  <?php if($sith_warriorStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="sith_warrior">
        <div class="title"><?php echo JText::_('SITH_WARRIOR'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($sith_warriorclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $sith_warriorclass1 ?>"><?php endif; ?> 
		<?php if($sith_warriorclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $sith_warriorclass2 ?>"><?php endif; ?> 
		<?php if($sith_warriorclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $sith_warriorclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($sith_warriorStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($sith_warriorInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($trooperStatus){ ?>
	  <?php if($trooperStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="trooper">
        <div class="title"><?php echo JText::_('TROOPER'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($trooperclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $trooperclass1 ?>"><?php endif; ?> 
		<?php if($trooperclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $trooperclass2 ?>"><?php endif; ?> 
		<?php if($trooperclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $trooperclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($trooperStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($trooperInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($smugglerStatus){ ?>
	  <?php if($smugglerStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="smuggler">
        <div class="title"><?php echo JText::_('SMUGGLER'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($smugglerclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $smugglerclass1 ?>"><?php endif; ?> 
		<?php if($smugglerclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $smugglerclass2 ?>"><?php endif; ?> 
		<?php if($smugglerclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $smugglerclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($smugglerStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($smugglerInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($empire_agentStatus){ ?>
	  <?php if($empire_agentStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="empire_agent">
        <div class="title"><?php echo JText::_('EMPIRE_AGENT'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($empire_agentclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $empire_agentclass1 ?>"><?php endif; ?> 
		<?php if($empire_agentclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $empire_agentclass2 ?>"><?php endif; ?> 
		<?php if($empire_agentclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $empire_agentclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($empire_agentStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($empire_agentInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($sith_inquisitorStatus){ ?>
	  <?php if($sith_inquisitorStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="sith_inquisitor">
        <div class="title"><?php echo JText::_('SITH_INQUISITOR'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($sith_inquisitorclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $sith_inquisitorclass1 ?>"><?php endif; ?> 
		<?php if($sith_inquisitorclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $sith_inquisitorclass2 ?>"><?php endif; ?> 
		<?php if($sith_inquisitorclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $sith_inquisitorclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($sith_inquisitorStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($sith_inquisitorInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>
	
		  <?php if($ambassadorStatus){ ?>
	  <?php if($ambassadorStatus && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
	<div id="ambassador">
        <div class="title"><?php echo JText::_('AMBASSADOR'); ?></div><div class="clear"></div>
		<div class="class"><div class="rolle"><?php echo JText::_('ROLL'); ?></div>
		<?php if($ambassadorclass1) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $ambassadorclass1 ?>"><?php endif; ?> 
		<?php if($ambassadorclass2) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $ambassadorclass2 ?>"><?php endif; ?> 
		<?php if($ambassadorclass3) : ?><img src="<?php echo $modulePath ?>tmpl/images/<?php echo $ambassadorclass3 ?>"><?php endif; ?> 
		</div>
	  <div class="info"><?php if($ambassadorStatus) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($ambassadorInfo) ?>
		<?php endif; ?>
	  </div>
	 </div></a>
	<?php } ?>	
	
	<?php if($allStatus_wc){ ?>
	<?php if($allStatus_wc && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="klassensuche_all_wc">
        <div class="title"><?php echo JText::_('ALL_WC'); ?></div><div class="clear"></div>
	  <div class="info"><?php if($allStatus_wc) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($allInfo_wc) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
	
		<?php if($allStatus_sw){ ?>
	<?php if($allStatus_sw && $coverLetterLink) : ?><a href="<?php echo $coverLetterLink ?>"><?php endif; ?>
  <div id="klassensuche_all_sw">
        <div class="title"><?php echo JText::_('ALL_SW'); ?></div><div class="clear"></div>
	  <div class="info"><?php if($allStatus_sw) : ?><?php print mod_klassensuche_searchHelper::getClassInfo($allInfo_sw) ?> 
		<?php endif; ?> 
	  </div>
	 </div></a>
	<?php } ?>
 <?php if(mod_klassensuche_searchHelper::domainCheck()) : ?>
	<div id="klassensuche_copyright"><a href=http://www.cmstyles.de target=_blank>powered by Cmstyles.de</a></div>
<?php endif; ?> 
</div>







