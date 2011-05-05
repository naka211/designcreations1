<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class EcommerceModelCategories extends JModel
{
	var $_data = null;
	var $_table = '#__pr_category';
	var $_list = null; 
	var $_page = null;

	
	var $sessionid = null;
	var $parentid = null;

	function &getTable()
	{
		if ($this->_table == null) {
			$this->_table = JTable::getInstance('categories', $this->getDBO() );
		}
		return $this->_table;
	}

	function getList()
	{
		global $mainframe;
		$session =& JFactory::getSession();
		
		if (!empty($this->_list)) {
			return $this->_list;
		}

		// Initialize variables
			
		$catgories =array();
		$this->getCategories(0,$catgories,"");
		$this->_list =$catgories ;
		//print_r($catgories );
		return $this->_list;
	}
	
	function getCategories($parent_id,&$array_cat,$separator=""){
		$query =' SELECT a.* ' .
				' FROM #__pr_category as a' .
				' where parent_id = '.$parent_id.
				' ORDER BY ordering';
		//print_r ($query);
		$this->_db->setQuery($query);
		$cats = $this->_db->loadObjectList();
		if($cats==NULL) return NULL;
		else {
			$i=1;
			foreach($cats as $cat){
				$cat->name_display = $separator.$i.". ".$cat->name ;
				if($parent_id==0) $cat->name_display = "<strong>".$cat->name_display."<strong>";
				$array_cat[] = $cat;
				$this->getCategories($cat->id,$array_cat,"&nbsp;&nbsp;&nbsp;&nbsp;".$separator.$i.".");
				$i++;
			}
		}
	}
	
	function getEndSubCatgory($parent_id,&$array_cat){
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
				$this->getEndSubCatgory($cat->id,$array_cat) ;
			}
		}		
	}
	
	function genOptioncat($parent_id,$space='',$group=false,$selected=0){
		
		
		$query =' SELECT a.* ' .
			' FROM #__pr_category as a' .
			' where parent_id = '.$parent_id.
			' ORDER BY ordering'; 
		$this->_db->setQuery($query);
		$cats = $this->_db->loadObjectList();
	
		
		//$space .="&nbsp;&nbsp;&nbsp;";
		if(count($cats)==0)
		{
			return NULL;
		}
		$list_menu ="";
		
		foreach($cats as $row){
			$row->space = $space;
		
			$space_next= $space . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
			$res=$this->genOptioncat($row->id,$space_next,$group,$selected);
			$select="";
			if($selected==$row->id) $select="selected=selected";
			
			if($group){
				if($res!=NULL) {
					$list_menu .= '<optgroup label="'.$space.$row->name.'">';
					$list_menu .=	$res;
					$list_menu .= '</optgroup>';
				}
				else {
					
					$list_menu .= '<option value='.$row->id.' '.$select.' >' .$space.$row->name.'</option>';
				}
				 
			}
			else{
				$list_menu .= '<option value='.$row->id.' '.$select.'>' .$space.$row->name.'</option>';
				if($res!=NULL) $list_menu .=	$res;
			}
		}

		return $list_menu;
	}
	
	
	function getPagination()
	{
		if (is_null($this->_list) || is_null($this->_page)) {
			$this->getList();
		}
		return $this->_page;
	}
	
	function getsessionid(){
		return $this->_sessionid;
	}
	
	function getparentid(){
		return $this->_parentid;
	}
	
	function getisparent(){
		$session =& JFactory::getSession();
		if($session->get('sid')>0){
			return true;
		} else {
			return false;
		}
	}

}

?>
