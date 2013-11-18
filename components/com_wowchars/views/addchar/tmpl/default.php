<?php
/**
 * Class ${NAME}
 *
 * Date: 09.09.13
 * Time: 13:00
 * @author Thomas Joußen <tjoussen@databay.de>
 */

//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');

$app = JFactory::getApplication();
?>
<?php if($app->getUserState("success")){ ?>
<script type="text/javascript">
	window.parent.document.getElementById( 'sbox-window' ).setAttribute("aria-hidden", true);
	window.parent.document.getElementById( 'sbox-overlay' ).setAttribute("aria-hidden", true);
	window.parent.location.reload();
</script>

<?php
	$app->setUserState("success", false);

	}else{
?>


<h1>Neuer Charakter</h1>

<form class="form-validate" action="<?php echo JRoute::_('index.php'); ?>" method="post" id="addchar" name="addchar">
	<fieldset>
		<div class="field"><?php echo $this->form->getLabel('realm'); ?> <?php echo $this->form->getInput('realm'); ?></div>
		<div class="field"><?php echo $this->form->getLabel('charname'); ?> <?php echo $this->form->getInput('charname'); ?></div>

		<input type="hidden" name="option" value="com_wowchars" />
		<input type="hidden" name="task" value="addchar.submit" />
		<div class="buttons"><input type="submit" name="submit" value="<?php echo JText::_('Submit'); ?>" /></div>

		<?php echo JHtml::_('form.token'); ?>
	</fieldset>
</form>
<div class="clr"></div>

<?php } ?>