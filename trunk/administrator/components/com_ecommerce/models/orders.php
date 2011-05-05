<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class EcommerceModelOrders extends JModel
{
	var $_data = null;
	var $_table = '#__pr_orders';
	var $_list = null; 
	var $_page = null; 

	function getList()
	{
		global $mainframe;
		
		// Initialize variables
		$db		=& $this->getDBO();

		if (!empty($this->_list)) {
			return $this->_list;
		}
		
		$search = null;
		$where = array();
		$search				= $mainframe->getUserStateFromRequest('orders.search', 'search', '','string');
		$search				= JString::strtolower($search);
		
		if ($search) {
			$where[] = 'LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) . ' OR LOWER( username ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false );
		}
		
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');


		// Get some variables from the request
		$option				= JRequest::getCmd( 'option' );
		$limit				= $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest('orders.limitstart', 'limitstart',		0,	'int');


		// Get the total number of records
		$query = 'SELECT COUNT(*) FROM #__pr_orders'. $where;
		$db->setQuery($query);
		$total = $db->loadResult();

		// Create the pagination object
		jimport('joomla.html.pagination');
		$this->_page = new JPagination($total, $limitstart, $limit);

		// Get the articles
		$query = 'SELECT * ' .
				' FROM #__pr_orders ' .
				
				$where .
				' ORDER BY #__pr_orders.order_date DESC';

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

	function getPagination()
	{
		if (is_null($this->_list) || is_null($this->_page)) {
			$this->getList();
		}
		return $this->_page;
	}
	
	function delete()
	{
		$cids = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$row =& $this->getTable();
		if (count( $cids ))		{
			$db	=& JFactory::getDBO();
			foreach($cids as $cid) {
				$db->setQuery("SELECT count(order_id) FROM #__pr_orders WHERE order_id=$cid");
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

}

?>
