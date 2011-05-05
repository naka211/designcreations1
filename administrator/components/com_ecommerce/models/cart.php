<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class EcommerceModelCart extends JModel
{

	var $_table = '#__pr_cart';
	var $_lists = null;

	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('codes',  0, '', 'array');
		$this->setCode($array[0]);
	}

	function setCode($code)
	{
		$this->_code		= $code;
		$this->_data	= null;
	}

	function &getData()
	{
		if (empty( $this->_data )) {
			$query = ' SELECT a.* , b.name as product_name FROM #__pr_cart as a LEFT JOIN #__pr_product as b ON a.product_id = b.id '.
					"  WHERE a.code like '".$this->_code."'";
			//print_r($query);
			$this->_db->setQuery( $query );
			$this->_data = $this->_db->loadObjectList();
		}
		if (!$this->_data) {
			$this->_data = new stdClass();
			$this->_data->id = 0;
			$this->_data->name = null;

			
		}
		return $this->_data;
	}


	function delete()
	{
		$codes = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$row =& $this->getTable();
		//print_r($codes); exit();
		if (count( $codes )>0){
			$db	=& JFactory::getDBO();
			foreach($codes as $code) {
				$query = "delete From #__pr_cart where code like '". $code."'";
				$db->setQuery($query);
				$db->query();	
			}						
		}
		return true;
	}

	
}

?>