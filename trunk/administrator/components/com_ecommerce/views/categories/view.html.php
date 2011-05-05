<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewCategories extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(   JText::_( 'Category' ), 'generic.png' );
		JToolBarHelper::deleteList();
		JToolBarHelper::editList();
		JToolBarHelper::addNew();
		JToolBarHelper::publishList('publishCat');
		JToolBarHelper::unpublishList('unpublishCat');


		// Get data from the model
		$categories		= & $this->get('List');
		$sessionid = & $this->get('sessionid');
		$parentid = & $this->get('parentid');
		$page = &$this->get('Pagination');
		$isparent = &$this->get('isparent');

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');

		$this->assignRef('page', $page);
		$this->assignRef('categories', $categories);
		$this->assignRef('sessionid', $sessionid);
		$this->assignRef('parentid', $parentid);
		$this->assignRef('isparent',$isparent);

		parent::display($tpl);
	}
}