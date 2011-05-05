<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class EcommerceControllerCarts extends JController
{
	function __construct( $default = array())
	{
		parent::__construct( $default );
	}

	function display() 
	{
	   $model = &JModel::getInstance( 'EcommerceModelCarts' );
	   $table = &$model->getTable();
		
	   $view = new EcommerceViewCarts( );
	   $view->setModel( $model, true );
	   $view->display();
	}

	function remove()
	{
		$model = $this->getModel('cart');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot deleted' );
		} else {
			$msg = JText::_( 'cart Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=carts', $msg );
	}

	function edit()
	{
		JRequest::setVar( 'view', 'cart' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}
	
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=carts&buyer_id'.$_SESSION['buyerid'], $msg );
	}
}
?>
