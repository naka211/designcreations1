<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class EcommerceModelDetail extends JModel
{
	var $_detail = null;
	var $_id = null;
	var $_topics = null;
	
	function __construct()
	{
		parent::__construct();
		$id = intval(JRequest::getVar('id', 0));
		$this->_id = $id;
	}
	function getDetail()
	{
		if(!$this->_detail)
		{
			global $mainframe;
			$this->_params = &$mainframe->getParams('com_ecommerce');
			
			$query = "SELECT * FROM #__pr_rate WHERE code = 'USD' ";
			$this->_db->setQuery($query);
			$rate = $this->_db->loadObject(); 
			
			$query = "SELECT a.*, if(c.rate>0,a.price*c.rate,a.price*$rate->rate) as price, b.name as company,  c.name as cat_name ".
			" FROM #__pr_product as a LEFT JOIN #__pr_company as b ON a.company_id = b.id left join #__pr_category c on a.category_id = c.id  WHERE  a.id = " . $this->_id ;
			
			$this->_db->setQuery($query);
			$this->_detail = $this->_db->loadObject();			

			if(!$this->_detail->published)
			{	
				JError::raiseError( 404, "Invalid ID provided" );	
			}
			else{
				if(trim($this->_detail->related)!=""){
					$query = "SELECT a.*, if(c.rate>0,a.price*c.rate,a.price*$rate->rate) as price, b.name as company,  c.name as cat_name ".
							" FROM #__pr_product as a LEFT JOIN #__pr_company as b ON a.company_id = b.id left join #__pr_category c on a.category_id = c.id  WHERE  a.id in  (" . $this->_detail->related .")" ;
					$this->_db->setQuery( $query );	
					$this->_detail->related = $this->_db->loadObjectList();							
				}
				else $this->_detail->related =NULL;
			}
			
			
			$user = & JFactory::getUser();
			$type = (!$user->get('guest')) ? 'logged' : 'guest'; 
			if( JRequest::getVar('nd_comment')!='' && $type=='logged' && JRequest::getVar('nd_comment')!='Nội dung bình luận ...')
			{
				$query = "insert into #__pr_topic(id,userid,content,published,ordering,product_id) values ('','".$user->get('id')."','".JRequest::getVar('nd_comment')."',1,0,".$this->_id.")";
				$this->_db->setQuery($query);
				$this->_db->query();
			}
		}
		return $this->_detail;
	}
	/*FROM b,a LEFT JOIN c ON (c.key=a.key) LEFT JOIN d ON (d.key=a.key)
    WHERE b.key=d.key;
*/
	
	function getTopics(){
		if(!$this->_topics){
			$query = "select * from #__pr_topic as t LEFT JOIN #__users as u ON (t.userid=u.id) where published =1 and product_id = ". $this->_id;
			//print_r($query);
			$this->_db->setQuery($query);
			$this->_topics = $this->_db->loadObjectList();
		}
		return $this->_topics;
	}
	
	function getParams(){
		return $this->_params;
	}
}
?>