<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class ImagesViewImages extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(   JText::_( 'Images' ), 'mediamanager' );
		JToolBarHelper::deleteList();
		JToolBarHelper::editList();
		JToolBarHelper::addNew();
		JToolBarHelper::publishList('publishCat');
		JToolBarHelper::unpublishList('unpublishCat');
		
		// Get data from the model
		$images		= & $this->get( 'List');

		$page = &$this->get('Pagination');
		$search = &$this->get('Search');

		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');
	
		$this->assignRef('page', $page);
		$this->assignRef('images', $images);
		$this->assignRef('search', $search);
		parent::display($tpl);
	}
}