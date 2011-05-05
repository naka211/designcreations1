<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class EcommerceModelCarts extends JModel
{
	var $_data = null;
	var $_table = '#__pr_session';
	var $_list = null; 
	var $_page = null; 
	var $_month = null;
	var $_year = null;

	function __construct()
	{
		parent::__construct();

		$this->_month = JRequest::getVar('month');
		$this->_year = JRequest::getVar('year');
	}
	
	function &getTable()
	{
		if ($this->_table == null) {
			$this->_table = JTable::getInstance('carts', $this->getDBO() );
		}
		return $this->_table;
	}

	function getList()
	{
		global $mainframe;
		$session =& JFactory::getSession();
		// Initialize variables
		$db		=& $this->getDBO();

		if (!empty($this->_list)) {
			return $this->_list;
		}
		if(JRequest::getVar('buyer_id')){
			$session->set('buyerid', JRequest::getVar('buyer_id'));
		}
		
		$search = null;
		$where = array();
		$search				= $mainframe->getUserStateFromRequest('carts.search', 'search', '',	'string');
		$search				= JString::strtolower($search);
		
		if ($search) {
			$where[] = 'LOWER( code ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) ;
		}
		
		if($this->_month > 0){
			$where[] = " MONTH(date_buy) = " . $this->_month; 
		} else {
			$where[] = " true";
		}
		
		if($this->_year > 0){
			$where[] = " YEAR(date_buy) = " . $this->_year;
		} else {
			$where[] = " true";
		}
		
		$where[] = ' buyer_id = '. $session->get('buyerid');
		
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');


		// Get some variables from the request
		$option				= JRequest::getCmd( 'option' );
		$limit				= $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart			= $mainframe->getUserStateFromRequest('buyers.limitstart', 'limitstart',		0,	'int');


		// Get the total number of records
		$query = 'SELECT COUNT(*) FROM #__pr_cart'. $where;
		$db->setQuery($query);
		$total = $db->loadResult();

		// Create the pagination object
		jimport('joomla.html.pagination');
		$this->_page = new JPagination($total, $limitstart, $limit);

		// Get the articles
		$query = 'SELECT * ' .
				' FROM #__pr_cart ' . $where .
				' GROUP BY code ORDER BY ordering';
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
	
	

}

?>
