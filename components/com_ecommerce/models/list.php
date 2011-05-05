<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ecommerce'.DS.'tables');	

class EcommerceModelList extends JModel
{
	var $_product = NULL;
	var $_endnode = NULL;
	var $_keyword = NULL;
	var $_issearch = 0;
	var $_where = NULL;
	var $_result = 0;
	var	$_sotrang = 0;
	var $_tht = 0;
	var $_page = NULL;
	var $_catid = NULL;
	var $_cat_info = NULL;
	var $_params=NULL;
	
	function __construct()
	{
		parent::__construct();
		$cid = JRequest::getVar('cid', 0);
		$this->_cid = $cid;		
		$this->_issearch = JRequest::getVar('issearch',0);
		
	}
	function getList()
	{
		if(!$this->_product)
		{		
			global $mainframe;
			if(!(JRequest::getVar('t',0))){
				$this->_tht = 1;
			}else {
				$this->_tht = (int)JRequest::getVar('t');
			}
		
			$this->_keyword = JRequest::getVar('keyword','');
			
			$where=' ';
			if(!empty($this->_keyword) && ($this->_keyword != 'Từ khóa tìm kiếm')){
				$where .= " and ( ( A.name like '%".$this->_keyword ."%' ) or ( A.code like '%".$this->_keyword ."%') )"; 
			}
			else $this->_keyword = "";
			
			if(JRequest::getVar('giatu')){
				$where .= " and A.price > ".intval(JRequest::getVar('giatu') );
			}
			
			if(JRequest::getVar('dengia')){
				$where .= " and A.price < ". intval(JRequest::getVar('dengia'));
			}
			
			
				
			$catid = intval(JRequest::getVar('catid'));
			if($catid)
			{
				$this->_catid = $catid;
				
				$query = "SELECT * FROM #__pr_category where id = $catid ";
				$this->_db->setQuery( $query );
				$cat_info = $this->_db->loadObject();
				if($cat_info==NULL) return ;
				
				$this->_cat_info  =  $cat_info;
				
				
				if($catid != 0 )
				{
					$this->getSubCatgory($catid,$sub_array);
					if(count($sub_array)==1)
					{
						$where .= ' AND A.category_id = '.$sub_array[0];
						if($sub_array[0]==$catid ) $this->_cat_info->endnode= 1;
						else $this->_cat_info->endnode = 0;
					}
					else
					{
						$where .= ' AND A.category_id in ('.  implode(",",$sub_array) .")";
						$this->_cat_info->endnode = 0;
					}
	
				}
			}
			
			//get total record
			$query = "SELECT count(A.id) FROM #__pr_product A left join #__pr_category B  on A.category_id = B.id  where A.published = 1 " . $where ;
			$this->_db->setQuery( $query );
			//tong so record
			$total = $this->_db->loadResult();
			$this->_result = $total;
			
			jimport('joomla.html.pagination');
			$this->_page = new JPagination($total, $limitstart, $limit);
			
			$this->_params = &$mainframe->getParams('com_ecommerce');

			$sodong= $this->_params->get('productperrow');;// so record trong 1 trang
			$this->_sotrang = ceil($total/$sodong);
			$vitridau = ($this->_tht -1 )* $sodong;
			
			
			
			$query = "SELECT A.*, B.name as cat_name, B.alias as cat_alias FROM #__pr_product A left join #__pr_category B  on A.category_id = B.id where A.published = 1 " . $where . " order by A.ordering, A.id desc limit " . $vitridau . " , " . $sodong ;
			//print_r($query);exit();
			$this->_db->setQuery($query);	
			$this->_product = $this->_db->loadObjectList();//print_r($this->_product); exit();
			
			return $this->_product;
		}
		//return $this->_product;
	}
	

	
	function getSubCatgory($parent_id,&$array_cat){
		$query =' SELECT a.* ' .
				' FROM #__pr_category as a' .
				' where parent_id = '.$parent_id.
				' ORDER BY ordering'; 
		$this->_db->setQuery($query);
		$cats = $this->_db->loadObjectList();
		if($cats==NULL){
		 	$array_cat[] = $parent_id;
		 	return NULL;
		} 
		else{
			foreach($cats as $cat){
				$this->getSubCatgory($cat->id,$array_cat) ;
			}
		}		
	}
	
	function getPagination()
	{
		if (is_null($this->_product) || is_null($this->_page)) {
			$this->getList();
		}
		return $this->_page;
	}
	
	function getSotrang(){
		return $this->_sotrang;
	}
	
	function getParams(){
		return $this->_params;
	}
	
	function getTotalResult(){
		return $this->_result;
	}

	function getTrangHienTai(){
		return $this->_tht;
	}
	
	function getIsSearch(){
		return $this->_issearch;
	}
	function getcatid(){
		return $this->_catid;
	}

	function getCatInfo(){
		return $this->_cat_info;
	}	
		
	
}
?>