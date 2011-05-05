<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewOrders extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$model = &$this->getModel();
		
		//$detail = JRequest::getVar('detail',0);
		$order_id = JRequest::getVar('order_id',0);
		if($order_id==0){
			$lists = $model->getList();
			$sotrang = $model->getSotrang();
			$tht = $model->getTrangHienTai();
			
			$username = $model->getUser('username');
		
			$this->assignRef('lists', $lists);
			
			$this->assignRef('sotrang', $sotrang);
			$this->assignRef('tht' , $tht);
			$this->assignRef('username', $username);
		}
		else{
			$order = $model->getOrderDetail($order_id);
			$this->assignRef('order', $order);
			//print_r($order);
			$tpl="detail";
		}
		parent::display($tpl);
	}
}
?>