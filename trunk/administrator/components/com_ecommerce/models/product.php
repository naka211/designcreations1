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

class EcommerceModelProduct extends JModel
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
		$this->_id		= $id;
	}
	
	function getParams(){
		return $this->_params;
	}
	
	

	function &getData()
	{
		if (empty( $this->_data )) 
		{
			$query = ' SELECT * FROM #__pr_product '.
					'  WHERE id = '.$this->_id;
					
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();	
			if(trim($this->_data->related)!=""){
				$query = ' SELECT id, name FROM #__pr_product '.
						'  WHERE id  in ('.$this->_data->related.')'; 
				$this->_db->setQuery( $query );	
				$this->_data->related = $this->_db->loadObjectList();
			}
			else $this->_data->related=NULL;
		}

		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->name = null;
			$this->_data->company_id= null;
			$this->_data->description = null;
			$this->_data->promotion_price = null;
			$this->_data->price = null;
			$this->_data->image = null;
			$this->_data->ordering = null;
			$this->_data->published = null;
			
		}
		
		return $this->_data;
	}
	
	

	function store()	{
		global $mainframe;
		$row =& $this->getTable();
		if(!$row->bind(JRequest::get('post'))){
			echo '<script>alert("'.$row->getError().'");window.history.go(-1);</script>\n';
			exit();
		}
		
		//all these lines are used to avoid lost data form post
		
		$row->description  = JRequest::getVar('description','','post','string',JREQUEST_ALLOWRAW);
		
		$row->name  = JRequest::getVar('name','','post','string',JREQUEST_ALLOWRAW);
		
		
		$row->price = doubleval(JRequest::getVar('price'));
		
		$row->ordering = intval(JRequest::getVar('ordering'));
		$row->published = intval(JRequest::getVar('published'));
		$row->promotion_price = intval(JRequest::getVar('promotion_price'));
		
		
		
		$row->category_id= JRequest::getVar('cat_id');
		
		if($_FILES['txthinh']['name'])
		{
			$row->image = $_FILES['txthinh']['name'];
		}
		
		if($_FILES['pricelist']['name'])
		{
			$row->pricelist = $_FILES['pricelist']['name'];
		}
		
		$row->alias = JFilterOutput::stringURLSafe($row->name);
					
		if(!$row->store()){
			echo '<script>alert("'.$row->getError().'");window.history.go(-1);</script>\n';
			exit();
		}
		else
		{
		
			$prodir = url_prodir($row->id,1); //print_r($prodir);exit();
			$upload = new se_upload();
				
			$pro_image = JRequest::getVar('image','','post','string');
						
			$upload->new_upload('txthinh', 1000000000);
			
			if(($upload->is_error == 0) && ($upload->is_image))
			{	
				if($pro_image!="")
				{
					unlink($prodir.$pro_image);
				} 
				$desphoto = $prodir.$upload->file_name;
				move_uploaded_file($upload->file_tempname, $desphoto);
				//$upload->upload_photo($desphoto, $image_width, $image_height);
			}
			
			
			$pricelist_path = "../components/com_ecommerce/pricelist/";
			$pro_pricelist = JRequest::getVar('pricelist1','','post','string');
						
			$upload->new_upload('pricelist', 1000000000);
			
			if(($upload->is_error == 0))
			{	
				if($pro_pricelist!="")
				{
					unlink($pricelist_path.$pro_pricelist);
				} 
				$des = $pricelist_path.$upload->file_name;
				move_uploaded_file($upload->file_tempname, $des);
				//$upload->upload_photo($desphoto, $image_width, $image_height);
			}			
			
			return true;
		}
	}

	function delete()
	{
		global $mainframe;
		$cid = JRequest::getVar('cid',array(),'','array');
		$db = JFactory::getDBO();
		if(count($cid)> 0 )
		{
			$cids = implode(',',$cid);

			$query = "select * from #__pr_product where id in ($cids)";
			$db->setQuery($query);
			$row = $db->loadObjectList();
						
			foreach ($row as $_file)
			{
				$prodir = url_prodir($_file->id,1);
				if(file_exists($prodir . $_file->image))
				{
					unlink($prodir . $_file->image);
					unlink($prodir . 'thumb_' . $_file->image);
				}
				if(file_exists($prodir . $_file->image1))
				{
					unlink($prodir . $_file->image1);
				}
				if(file_exists($prodir . $_file->image2))
				{
					unlink($prodir . $_file->image2);
				}
				if(file_exists($prodir . $_file->image3))
				{
					unlink($prodir . $_file->image3);
				}
				if(file_exists($prodir . $_file->image4))
				{
					unlink($prodir . $_file->image4);
				}
				unlink($prodir . 'index.php');
				rmdir($prodir);
			}
			$query = "Delete From #__pr_product Where id in ($cids)";
			$db->setQuery($query);
			if(!$db->query())
			{
				echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
			}
		}

		return true;
	}

	function publish($publish) {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		JArrayHelper::toInteger($cid);
	
		if ( count( $cid ) < 1 ) {
			$action = $publish ? 'Publish' : 'Unpublish';
			JError::raiseError(500, JText::_( 'Select Item to '.$action, true ) );
		}
		
		$cids = implode( ',', $cid );
		$count = count( $cid );
		$query = 'UPDATE #__pr_product'
		. ' SET published = '.(int) $publish
		. ' WHERE id IN ( '.$cids.' )'
		;

		$db =& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query()) {
			JError::raiseError(500, $db->getErrorMsg() );
		}
	
	}
	
	function setNew($new) {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		JArrayHelper::toInteger($cid);
	
		if ( count( $cid ) < 1 ) {
			$action = $publish ? 'New' : 'UnNew';
			JError::raiseError(500, JText::_( 'Select Item to '.$action, true ) );
		}
		
		$cids = implode( ',', $cid );
		$count = count( $cid );
		$query = 'UPDATE #__pr_product'
		. ' SET isnew = '.(int) $new
		. ' WHERE id IN ( '.$cids.' )'
		;

		$db =& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query()) {
			JError::raiseError(500, $db->getErrorMsg() );
		}
	
	}

	function orderSection( $uid, $inc)
	{
		$row =& $this->getTable();
		$row->load( $uid );
		$row->move( $inc);
	}

	function saveOrder( &$cid )
	{
		$row =& $this->getTable();
	
		$total		= count( $cid );
		$order		= JRequest::getVar( 'order', array(0), 'post', 'array' );
		JArrayHelper::toInteger($order, array(0));
	
		// update ordering values
		for( $i=0; $i < $total; $i++ )
		{
			$row->load( (int) $cid[$i] );
			if ($row->ordering != $order[$i]) {
				$row->ordering = $order[$i];
				if (!$row->store()) {
					JError::raiseError(500, $db->getErrorMsg() );
				}
			}
		}
	
		$row->reorder();
	}


}

?>