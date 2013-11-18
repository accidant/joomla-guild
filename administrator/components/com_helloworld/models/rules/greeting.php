<?php

/**
 * Class JFormRuleGreeting
 *
 * Date: 10.07.13
 * Time: 09:10
 * @author Thomas Joußen <tjoussen@databay.de>
 */
//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.form.formrule");

class JFormRuleGreeting extends JFormRule{

	protected $regex = '/^[^0-9]+$/';
}
