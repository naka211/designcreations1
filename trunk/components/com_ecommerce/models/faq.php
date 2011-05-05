<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ecommerce'.DS.'tables');	

class EcommerceModelFaq extends JModel
{
	var $_product = NULL;
	
	function __construct()
	{
		parent::__construct();
	}
	
	function getList()
	{
				
		global $mainframe;
		
		$query = "SELECT introtext FROM #__content WHERE catid = 1" ;
		
		$this->_db->setQuery($query);	
		$this->_product = $this->_db->loadObjectList();
		
		return $this->_product;
		
	}
	
		
	
}
?>