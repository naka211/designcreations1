<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class EcommerceControllerOrders extends JController
{
	function __construct( $default = array())
	{
		parent::__construct( $default );
		JHTML::_('behavior.modal', 'a.modal');
		//$this->registerTask( 'add', 'edit' );
	}

	function display() 
	{
	  parent::display();
	}
	
	function edit()
	{
		JRequest::setVar( 'view', 'order' );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}
  
  	function remove()
	{
		$model = $this->getModel('orders');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot deleted' );
		} else {
			$msg = JText::_( 'Orders Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=orders', $msg );
	}
	
	function chothanhtoan()
	{	
		$db =& JFactory::getDBO();
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		
		$query = "UPDATE #__pr_orders SET order_status = 1 WHERE order_id IN (". implode(",",$cid) .")";
		$db->setQuery($query);
		if (!$db->query())
		{
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}
		$msg = "Item(s) successfully Changed";
		$this->setRedirect("index.php?option=com_ecommerce&controller=orders", $msg);
	}
	
	function dathanhtoan()
	{	
		$db =& JFactory::getDBO();
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		
		$query = "UPDATE #__pr_orders SET order_status = 2 WHERE order_id IN (". implode(",",$cid) .")";
		$db->setQuery($query);
		if (!$db->query())
		{
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}
		$msg = "Item(s) successfully Changed";
		$this->setRedirect("index.php?option=com_ecommerce&controller=orders", $msg);
	}
	
	function dagiaohang()
	{	
		$db =& JFactory::getDBO();
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		
		$query = "UPDATE #__pr_orders SET order_status = 3 WHERE order_id IN (". implode(",",$cid) .")";
		$db->setQuery($query);
		if (!$db->query())
		{
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}
		$msg = "Item(s) successfully Changed";
		$this->setRedirect("index.php?option=com_ecommerce&controller=orders", $msg);
	}
	
	function khongchapnhan()
	{	
		$db =& JFactory::getDBO();
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		
		$query = "UPDATE #__pr_orders SET order_status = 4 WHERE order_id IN (". implode(",",$cid) .")";
		$db->setQuery($query);
		if (!$db->query())
		{
			JError::raiseError( 500, $db->getErrorMsg() );
			return false;
		}
		$msg = "Item(s) successfully Changed";
		$this->setRedirect("index.php?option=com_ecommerce&controller=orders", $msg);
	}
}
?>
