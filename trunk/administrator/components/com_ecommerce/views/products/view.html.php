<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewProducts extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(   JText::_( 'Products' ), 'generic.png' );
		//JToolBarHelper::newwindow('javascript:openPage(\'index.php?option=com_ecommerce&controller=products&task=export_excel\',1,1)','exportexcel.png', 'Export Excel');
		//JToolBarHelper::modalcustom("index.php?option=com_ecommerce&controller=products&task=import_excel&layout=form&tmpl=component", "importexcel.png", "Cập nhật bảng giá");
		JToolBarHelper::deleteList();
		JToolBarHelper::editList();
		JToolBarHelper::addNew();
		JToolBarHelper::publishList('publishCat');
		JToolBarHelper::unpublishList('unpublishCat');
		
		// Get data from the model
		$products		= & $this->get( 'List');
		$catgories		= & $this->get( 'Catgories');
		$params			= & $this->get( 'Params');

		$page = &$this->get('Pagination');
		$search = &$this->get('Search');

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');
	
		$this->assignRef('page', $page);
		$this->assignRef('products', $products);
		$this->assignRef('catgories', $catgories);
		$this->assignRef('params', $params);
		$this->assignRef('search', $search);
		parent::display($tpl);
	}
}