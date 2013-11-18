<?php
/**
 * Class ${NAME}
 *
 * Date: 09.07.13
 * Time: 14:23
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");
?>
<h1><?php echo $this->item->greeting.(($this->item->category and $this->item->params->get('show_category'))
			? (' ('.$this->item->category.')') : ''); ?>
</h1>