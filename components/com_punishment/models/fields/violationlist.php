<?php

// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');

JFormHelper::loadFieldClass('list');

/**
 * Class JFormFieldViolationlist
 *
 * Date: 11.11.13
 * Time: 10:18
 * @author Thomas Joußen <tjoussen@databay.de>
 */
class JFormFieldViolationlist extends JFormFieldList
{

	protected $type = "violationlist";

	protected function getOptions()
	{
		$options = array();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*')
			->from("#__punishment_violation");

		$db->setQuery($query);
		$results = $db->loadAssocList();
		foreach($results as $result)
		{
			$options[] = JHtml::_('select.option', $result['id'], $result['title']);
		}

		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
 