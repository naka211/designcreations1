<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewCarts extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(   JText::_( 'Quản lí Giỏ hàng' ), 'generic.png' );


		// Get data from the model
		$carts		= & $this->get( 'List');
		$page = &$this->get('Pagination');

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');

		$this->assignRef('page', $page);
		$this->assignRef('carts', $carts);

		parent::display($tpl);
	}
}