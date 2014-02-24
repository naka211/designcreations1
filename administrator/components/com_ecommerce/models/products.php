<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );
require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . "models" . DS . "categories.php");
class EcommerceModelProducts extends JModel
{
	var $_data = null;
	var $_table = '#__pr_product';
	var $_list = null; 
	var $_catgories = null; 
	var $_page = null;
	var $_search = null;

	var $parentid = null;
	var $_params = NULL;

	function &getTable()
	{
		if ($this->_table == null) {
			$this->_table = JTable::getInstance('produsts', $this->getDBO() );
		}
		return $this->_table;
	}

	function getList()
	{
		global $mainframe;

		if (!empty($this->_list)) {
			return $this->_list;
		}

		// Initialize variables
		$db		=& $this->getDBO();
		
		$search = null;
		$where = array();
		$layout_action = JRequest::getVar('layout','');
		if($layout_action=='')$layout_action = "products";
		if(JRequest::getVar('reset',0)!=1){
			$this->_search['title']			= $mainframe->getUserStateFromRequest("$layout_action.title", 'title', '',	'string');
			$this->_search['title']			= JString::strtolower($this->_search['title']);
			$this->_search['category']	= $mainframe->getUserStateFromRequest("$layout_action.category", 'category', 0,	'int');  
			
			$limitstart			=  $mainframe->getUserStateFromRequest("$layout_action.limitstart", 'limitstart',0,	'int');
		}
		
		$category = $this->_search['category'] ;
		if($category != 0 ){
			$EcommerceModelCategories = new EcommerceModelCategories();
			$EcommerceModelCategories->getEndSubCatgory($category,$sub_array); 
			if(count($sub_array)==1){
				$where[] = ' a.category_id = '.$sub_array[0];
			}
			else{
				$where[] = ' a.category_id in ('.  implode(",",$sub_array) .")";
			}
		}
		$this->_params = &JComponentHelper::getParams( 'com_ecommerce' );
		
		
		if ($this->_search['title']) {
			$where[] = '(( LOWER( a.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_search['title']	, true ).'%', false ) .') or ( LOWER( a.code ) LIKE '.$db->Quote( '%'.$db->getEscaped( $this->_search['title']	, true ).'%', false ) .'))';
		}
		
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');

		// Get some variables from the request
		$option				= JRequest::getCmd( 'option' );
		$limit				= $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		//$limitstart			=  $mainframe->getUserStateFromRequest("$layout_action.limitstart", 'limitstart',0,	'int');


		// Get the total number of records
		$query = 'SELECT COUNT(*) FROM #__pr_product a ' . $where; //print $query ;
		$db->setQuery($query);
		$total = $db->loadResult();
		
		// Create the pagination object
		jimport('joomla.html.pagination');
		$this->_page = new JPagination($total, $limitstart, $limit);

		// Get the articles
		$query = 'SELECT a.*, c.name as catname ' .
				' FROM #__pr_product as a INNER JOIN #__pr_category c ON a.category_id = c.id ' .
				
				$where .
				' ORDER BY a.category_id, a.id';
		//print_r ($query);
		$db->setQuery($query, $this->_page->limitstart, $this->_page->limit);
		$this->_list = $db->loadObjectList();

		//If there is a db query error, throw a HTTP 500 and exit
		if ($db->getErrorNum()) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}

		return $this->_list;
	}
	
	function getCatgories(){
		if(empty($this->_catgories)){
			$EcommerceModelCategories = new EcommerceModelCategories();
			$catgories =array();
			$EcommerceModelCategories->getCategories(0,$catgories,""); 
			$this->_catgories =  $catgories; 
		}
	
		return $this->_catgories ;
	}
	
	
	
	function getPagination()
	{
		if (is_null($this->_list) || is_null($this->_page)) {
			$this->getList();
		}
		return $this->_page;
	}
	
	function getParams(){
		return $this->_params;
	}
	
	function getparentid(){
		return $this->_parentid;
	}
	
	function getSearch()
	{
		return $this->_search;
	}

}

?>
