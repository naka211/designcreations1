<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewCart extends JView
{
	function display($tpl = null)
	{
		$carts		=& $this->get('Data');
		
		JToolBarHelper::title( JText::_( 'Chi tiết mua hàng' ) );
		
		JToolBarHelper::cancel();

		$this->assignRef('carts', $carts);

		parent::display($tpl);
	}
}
