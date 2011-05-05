<?php
/**
*    Images Saler - Component
*    Author : hm_advert@ymail.com
*    
**/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.client.helper');
jimport('joomla.application.component.model');
require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . "libs" . DS . "functions.php");

class EcommerceModelOrder extends JModel
{
	
	var $_id = null;
	var $_table = '#__pr_product';
	var $_lists = '';
	var $_data = null;
	var $_params = NULL;
	var $_sessionid = null;
	var $_parentid = null;
	var $_childcatid = null;
	
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
		$this->_params = &JComponentHelper::getParams( 'com_ecommerce' );
	}

	function setId($id)
	{
		$this->_id = $id;
	}
	
	
	function &getData()
	{
		$query = ' SELECT * FROM #__pr_cart '.
				'  WHERE order_id = '.$this->_id;
		$this->_db->setQuery( $query );
		$this->_data = $this->_db->loadObjectList();	
		
		return $this->_data;
	}
	
}

?>