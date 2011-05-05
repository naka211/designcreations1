<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
//JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_imgsaler'.DS.'tables');	

class ModelEcommerceDetailcart extends JModel
{
	var $_data = null;
	var $_id = null;
	var $_list = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_all = JRequest::getVar('type');
		$this->_id = JRequest::getVar('id');
	}
	
	function getType(){
		$user = & JFactory::getUser();
		return (!$user->get('guest')) ? 'logined' : 'free';
	}
	
	function getUser($arg){
		$user = & JFactory::getUser();
		return $user->get($arg);
	}
	
	
	function getList()
	{
		$type = $this->getType(); 
		if($type == 'logined'){
			if(!$this->_list)
			{		
			
				//tim id cua buyer
				/*$query = "select id from #__pr_buyer where user_id = ". $this->getUser('id');
				$this->_db->setQuery($query);
				$r=$this->_db->loadObject();*/
				
				$user_id = $this->getUser('id');
				
				$query = "SELECT a.* , b.name as pr_name FROM #__pr_cart as a LEFT JOIN #__pr_product as b ON a.product_id = b.id where a.code = '". $this->_id ."' and a.user_id = " . $user_id . " ". $where . " order by a.date_buy desc " ;
				//die($query);
				$this->_db->setQuery($query);	
				if ($this->_list = $this->_db->loadObjectList()){

					return $this->_list;
				}
			}
			return $this->_list;
		}	
	}
	


}
?>