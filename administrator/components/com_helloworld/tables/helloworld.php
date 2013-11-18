<?php

/**
 * Class HelloWorldTableHelloWorld
 *
 * Date: 09.07.13
 * Time: 14:55
 * @author Thomas Joußen <tjoussen@databay.de>
 */

//No direct access to this file
defined("_JEXEC") or die("Restricted Access");

//import Joomla libary
jimport("joomla.database.table");


class HelloWorldTableHelloWorld extends JTable{

	public function __construct(&$db){
		parent::__construct('#__helloworld', 'id', $db);
	}

	public function bind($array, $ignore = ''){
		if(isset($array['params']) && is_array($array['params'])){
			$parameter = new JRegistry();
			$parameter->loadArray($array['params']);
			$array['params'] = (string)$parameter;
		}
		// Bind the rules.
		if (isset($array['rules']) && is_array($array['rules']))
		{
			$rules = new JAccessRules($array['rules']);
			$this->setRules($rules);
		}

		return parent::bind($array, $ignore);
	}

	public function load($pk = null, $reset = true){
		if(parent::load($pk, $reset)){
			$params = new JRegistry();
			$params->loadString($this->item->params, 'JSON');
			$this->params = $params;

			return true;
		}
		else{
			return false;
		}
	}

	/**
	 * Method to compute the default name of the asset.
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 *
	 * @return      string
	 * @since       2.5
	 */
	protected function _getAssetName()
	{
		$k = $this->_tbl_key;
		return 'com_helloworld.message.'.(int) $this->$k;
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return      string
	 * @since       2.5
	 */
	protected function _getAssetTitle()
	{
		return $this->greeting;
	}

	/**
	 * Method to get the asset-parent-id of the item
	 *
	 * @return      int
	 */
	protected function _getAssetParentId()
	{
		// We will retrieve the parent-asset from the Asset-table
		$assetParent = JTable::getInstance('Asset');
		// Default: if no asset-parent can be found we take the global asset
		$assetParentId = $assetParent->getRootId();

		// Find the parent-asset
		if (($this->catid)&& !empty($this->catid))
		{
			// The item has a category as asset-parent
			$assetParent->loadByName('com_helloworld.category.' . (int) $this->catid);
		}
		else
		{
			// The item has the component as asset-parent
			$assetParent->loadByName('com_helloworld');
		}

		// Return the found asset-parent-id
		if ($assetParent->id)
		{
			$assetParentId=$assetParent->id;
		}
		return $assetParentId;
	}
}
