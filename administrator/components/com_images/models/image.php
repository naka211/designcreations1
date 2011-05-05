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

class ImagesModelImage extends JModel
{
	
	var $_id = null;
	var $_table = '#__images';
	var $_lists = '';
	var $_data = null;
	var $_params = NULL;
	
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
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
			$query = ' SELECT * FROM #__images '.
					'  WHERE id = '.$this->_id;
					
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();	
			
		}

		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->name = null;
			$this->_data->catid= null;
			$this->_data->thumb = null;
			$this->_data->full = null;
			$this->_data->ordering = null;
			$this->_data->publish = null;
			
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
				
		$row->name  = JRequest::getVar('name','','post','string',JREQUEST_ALLOWRAW);
				
		$row->ordering = intval(JRequest::getVar('ordering'));
		$row->publish = intval(JRequest::getVar('publish'));		
		
		$row->catid= JRequest::getVar('catid');
		$rand = mt_rand();
		
		if($_FILES['thumb']['name'])
		{
			$row->thumb = $rand.'thumb_'.$_FILES['thumb']['name'];
		}
		
		if($_FILES['full']['name'])
		{
			$row->full = $rand.$_FILES['full']['name'];
		}
		
		
		if(!$row->store()){
			echo '<script>alert("'.$row->getError().'");window.history.go(-1);</script>\n';
			exit();
		}
		else
		{
			$row->reorder();
			$prodir = '../images/imgupload/';
			$upload = new se_upload();
				
			$thumbimage = JRequest::getVar('thumbimage','','post','string');
			$fullimage = JRequest::getVar('fullimage','','post','string');
			
			$upload->new_upload('thumb', 1000000000);
			
			if(($upload->is_error == 0) && ($upload->is_image))
			{	
				if($thumbimage!="")
				{
					unlink($prodir.$thumbimage);
				} 
				$desphoto = $prodir.$rand.'thumb_'.$upload->file_name;
				move_uploaded_file($upload->file_tempname, $desphoto);
			}
			
			$upload->new_upload('full', 1000000000);
			
			if(($upload->is_error == 0) && ($upload->is_image))
			{	
				if($fullimage!="")
				{
					unlink($prodir.$fullimage);
				} 
				$desphoto = $prodir.$rand.$upload->file_name;
				move_uploaded_file($upload->file_tempname, $desphoto);
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

			$query = "select * from #__images where id in ($cids)";
			$db->setQuery($query);
			$row = $db->loadObjectList();
						
			foreach ($row as $_file)
			{
				$prodir = '../com_images/images/';
				if(file_exists($prodir . $_file->full))
				{
					unlink($prodir . $_file->full);
				}
				if(file_exists($prodir . $_file->thumb))
				{
					unlink($prodir . $_file->thumb);
				}
			}
			$query = "DELETE FROM #__images WHERE id IN ($cids)";
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
		$query = 'UPDATE #__images'
		. ' SET publish = '.(int) $publish
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