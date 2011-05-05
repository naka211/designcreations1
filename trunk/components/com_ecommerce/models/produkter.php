<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ecommerce'.DS.'tables');	

class EcommerceModelProdukter extends JModel
{
	var $_product = NULL;
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getList()
	{
		if(!$this->_product)
		{		
			global $mainframe;
			
			$query = "SELECT * FROM #__pr_product WHERE category_id = 1" ;
			
			$this->_db->setQuery($query);	
			$this->_product = $this->_db->loadObjectList();
			
			return $this->_product;
		}
	}
	
		
	
}
?>