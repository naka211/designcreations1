<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
//JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_imgsaler'.DS.'tables');	

class EcommerceModelOrders extends JModel
{
	var $_list = null;
	var $_month = null;
	var $_year = null;
	var	$_sotrang = 0;
	var $_tht = 0;
	
	function __construct()
	{
		parent::__construct();
		$this->_day = JRequest::getVar('day','');
		$this->_month = JRequest::getVar('month');
		$this->_year = JRequest::getVar('year');
		$this->_all = JRequest::getVar('type');
	}
	
	function getType(){
		$user = & JFactory::getUser();
		return (!$user->get('guest')) ? 'logined' : 'free';
	}
	
	function getUser($arg){
		$user = & JFactory::getUser();
		return $user->get($arg);
	}
	
	function getOrderDetail($order_id){
		$query = "SELECT * FROM #__pr_orders where order_id  = ". $order_id ." limit 1" ;
		$this->_db->setQuery($query);	
		if($order = $this->_db->loadObject()){
			$query = "SELECT * FROM #__pr_cart where order_id  = " . $order_id . "  order by id";
			$this->_db->setQuery( $query );
			$order->products = $this->_db->loadObjectList();
		}
		return $order;
	}
	
	function getList()
	{
		$type = $this->getType();
		if($type == 'logined'){
			if(!$this->_list)
			{		
				if(!(JRequest::getVar('t'))){
					$this->_tht = 1;
				}else {
					$this->_tht = JRequest::getVar('t');
				}
			
				$where = ''; //sau n?d??de kiem tra loc theo thang
				if($this->_month==0){
					$where ='';
				} else if($this->_month!=''){
					$where .= " and MONTH(order_date) = " . $this->_month; 
				} else {
					$where .= " and MONTH(order_date) = " . date('m');
				}
				
				if($this->_year==0){
					$where ='';
				} else if($this->_year!=''){
					$where .= " and YEAR(order_date) = " . $this->_year;
				} else {
					$where .= " and YEAR(order_date) = " . date('Y');
				}
				
				$user_id = $this->getUser('id');
				//tim id cua buyer
				//$query = "select id from #__pr_buyer where user_id = ". $this->getUser('id');
				//$this->_db->setQuery($query);
				//$r=$this->_db->loadObject();
				
				//get total record
				$query = "SELECT count(order_id) FROM #__pr_orders where order_user_id  = " . $user_id . " ". $where."  order by order_date desc";
				$this->_db->setQuery( $query );
				//tong so record
				$total = $this->_db->loadResult();
				//$pparams = &$mainframe->getParams('com_imgsaler');
				//$pparams->get('limit');
				$sodong= 10;// so record trong 1 trang
				$this->_sotrang = ceil($total/$sodong);
				$vitridau = ($this->_tht -1 )* $sodong;
				
				$query = "SELECT * FROM #__pr_orders where order_user_id  = " . $user_id . " ". $where . "  order by order_date desc limit " . $vitridau . " , " . $sodong ;
				//echo $query;
				$this->_db->setQuery($query);	
				if ($this->_list = $this->_db->loadObjectList()){
					return $this->_list;
				}
			}
			return $this->_list;
		}	
	}
	

	function getSotrang(){
		return $this->_sotrang;
	}

	function getTrangHienTai(){
		return $this->_tht;
	}

}
?>