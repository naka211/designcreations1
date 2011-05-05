<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewOrder extends JView
{
	function display($tpl = null)
	{
		$model = $this->getModel('order');
		$cart =$model->getData();
		
		JToolBarHelper::title( JText::_( 'Order infomation' ) );

		JToolBarHelper::cancel( 'cancel', 'close' );

		$this->assignRef('cart', $cart);

		parent::display($tpl);
	}
}