<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class EcommerceModelCategory extends JModel
{

	var $_table = '#__pr_category';
	var $insertid=0;

	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}

	function setId($id)
	{
		$this->_id		= $id;
		$this->_data	= null;
	}

	function &getData()
	{
		if (empty( $this->_data )) {
			$query = ' SELECT * FROM #__pr_category '.
					'  WHERE id = '.$this->_id;
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObject();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->name = null;

			
		}
		return $this->_data;
	}
	
	function moveProducts($from_cat, $to_cat){
		$query = ' SELECT count(id) FROM #__pr_product '.
				 '  WHERE category_id = '.$from_cat;
		$this->_db->setQuery( $query );
		$total_pro = $this->_db->loadResult();
		if($total_pro>0){
			$query = ' UPDATE #__pr_product set category_id = '.$to_cat.
					 '  WHERE category_id = '.$from_cat;
			$this->_db->setQuery( $query );
			$this->_db->query();
		}				
	}
   
   
	function store()	{
		$row =& $this->getTable();
						
		$data = JRequest::get( 'post' );
		
		$parentid  = JRequest::getVar('parent_id') ;

		//$row->parent_id = $parentid;

		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		
		if (!$row->store()) {
			$this->setError( $row->getErrorMsg() );
			return false;
		}
		else{
			if($parentid>0)$this->moveProducts($parentid, $row->id);
		}

		return true;
	}

	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$row =& $this->getTable();
		if (count( $cids ))		{
			$db	=& JFactory::getDBO();
			foreach($cids as $cid) {
				$db->setQuery("SELECT count(id) FROM #__pr_category WHERE id=$cid");
				$total = $db->loadResult();
				
				if($total!= 0 ) {
					if (!$row->delete( $cid )) {
						$this->setError( $row->getErrorMsg() );
						return false;
					}
				} else {
					$this->setError( " Can not delete! " );
					return false;
				}
				
			}						
		}
		return true;
	}
	
	function publish($publish) {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );

		JArrayHelper::toInteger($cid);
	
		if ( count( $cid ) < 1 ) {
			$action = $publish ? 'publish' : 'unpublish';
			JError::raiseError(500, JText::_( 'Chọn một phân lọai để '.$action, true ) );
		}
		
		$cids = implode( ',', $cid );
		$count = count( $cid );
		$query = 'UPDATE #__pr_category'
		. ' SET published = '.(int) $publish
		. ' WHERE id IN ( '.$cids.' )'
		;

		$db =& JFactory::getDBO();
		$db->setQuery( $query );
		if (!$db->query()) {
			JError::raiseError(500, $db->getErrorMsg() );
		}
	
	}

	function orderSection( $uid, $inc )
	{
		$row =& $this->getTable();
		$row->load( $uid );
		$row->move( $inc );
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