<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewOrders extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(   JText::_( 'Orders' ), 'generic.png' );
		
		//JToolBarHelper::custom('chothanhtoan', 'chothanhtoan.png', 'chothanhtoan.png', 'Pending', false, false);
		//JToolBarHelper::custom('dathanhtoan', 'dathanhtoan.png', 'dathanhtoan.png', 'Confirmed', false, false);
		//JToolBarHelper::custom('khongchapnhan', 'khongchapnhan.png', 'khongchapnhan.png', 'Cancelled', false, false);
		
		JToolBarHelper::deleteList();
		
		
		// Get data from the model
		$model = & $this->getModel();
		
		$orders = $model->getList();
		$page = $model->getPagination();

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');

		$this->assignRef('page', $page);
		$this->assignRef('orders', $orders);
		
		parent::display($tpl);
	}
}
?>