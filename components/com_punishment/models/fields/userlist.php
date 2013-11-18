<?php

// No direct access to this file
defined('_JEXEC') or die;

// import the list field type
jimport('joomla.form.helper');

JFormHelper::loadFieldClass('list');

/**
 * Class JFormFieldUserlist
 *
 * Date: 11.11.13
 * Time: 10:18
 * @author Thomas Joußen <tjoussen@databay.de>
 */
class JFormFieldUserlist extends JFormFieldList
{

	protected $type = "userlist";

	protected function getOptions()
	{
		$options = array();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('*')
			->from("#__users")
			->where('id !=' . $db->quote(646))
		;


		$db->setQuery($query);
		$results = $db->loadAssocList();

		foreach($results as $result)
		{
			$options[] = JHtml::_('select.option', $result['id'], $result['name']);
		}

		$options = array_merge(parent::getOptions(), $options);
		return $options;
	}
}
 