<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ecommerce'.DS.'tables');	

class ImagesModelPortefolje extends JModel
{
	var $_pagetotal = NULL;
	
	function __construct()
	{
		parent::__construct();
	
	}
	
	function getLogo()
	{ 
				
		global $mainframe;
		
		$page1 = JRequest::getVar('page1',1); 
		//get total record
		$query = "SELECT count(id) FROM #__images where catid = 1 AND publish = 1 ORDER BY ordering" ;
		$this->_db->setQuery( $query );
		//tong so record
		$total = $this->_db->loadResult();

		$image_num = 20;// so record trong 1 trang
		$this->_pagetotal['logo_page'] = ceil($total/$image_num);
		$start = ($page1 - 1) * $image_num;
			
		$query = "SELECT * FROM #__images WHERE catid = 1 AND publish = 1 ORDER BY ordering LIMIT " . $start . " , " . $image_num;

		$this->_db->setQuery($query);	
		$product = $this->_db->loadObjectList();//print_r($this->_product); exit();
		
		return $product;
	}
	
	function getCard()
	{ 
				
		global $mainframe;
		
		$page2 = JRequest::getVar('page2',1);
		//get total record
		$query = "SELECT count(id) FROM #__images where catid = 2 AND publish = 1 ORDER BY ordering" ;
		$this->_db->setQuery( $query );
		//tong so record
		$total = $this->_db->loadResult();

		$image_num = 9;// so record trong 1 trang
		$this->_pagetotal['card_page'] = ceil($total/$image_num);
		$start = ($page2 - 1) * $image_num;
			
		$query = "SELECT * FROM #__images WHERE catid = 2 AND publish = 1 ORDER BY ordering LIMIT " . $start . " , " . $image_num;

		$this->_db->setQuery($query);	
		$product = $this->_db->loadObjectList();//print_r($this->_product); exit();
		
		return $product;
	}
	
	function getLetter()
	{ 
				
		global $mainframe;
		
		$page3 = JRequest::getVar('page3',1);
		//get total record
		$query = "SELECT count(id) FROM #__images where catid = 3 AND publish = 1 ORDER BY name ASC" ;
		$this->_db->setQuery( $query );
		//tong so record
		$total = $this->_db->loadResult();

		$image_num = 9;// so record trong 1 trang
		$this->_pagetotal['letter_page'] = ceil($total/$image_num);
		$start = ($page3 - 1) * $image_num;
			
		$query = "SELECT * FROM #__images WHERE catid = 3 AND publish = 1 ORDER BY ordering LIMIT " . $start . " , " . $image_num;

		$this->_db->setQuery($query);	
		$product = $this->_db->loadObjectList();//print_r($this->_product); exit();
		
		return $product;
	}
	
	function getBrochure()
	{ 
				
		global $mainframe;
		
		$page4 = JRequest::getVar('page4',1);
		//get total record
		$query = "SELECT count(id) FROM #__images where catid = 4 AND publish = 1 ORDER BY name ASC" ;
		$this->_db->setQuery( $query );
		//tong so record
		$total = $this->_db->loadResult();

		$image_num = 9;// so record trong 1 trang
		$this->_pagetotal['brochure_page'] = ceil($total/$image_num);
		$start = ($page4 - 1) * $image_num;
			
		$query = "SELECT * FROM #__images WHERE catid = 4 AND publish = 1 ORDER BY ordering LIMIT " . $start . " , " . $image_num;

		$this->_db->setQuery($query);	
		$product = $this->_db->loadObjectList();//print_r($this->_product); exit();
		
		return $product;
	}
	
	function getPageTotal(){
		return $this->_pagetotal;
	}		
	
}
?>