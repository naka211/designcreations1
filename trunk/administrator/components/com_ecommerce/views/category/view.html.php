<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewCategory extends JView
{
	function display($tpl = null)
	{
		$category		=& $this->get('Data');
		
		JToolBarHelper::title( JText::_( 'Category' ) );
		
		JToolBarHelper::save();
		JToolBarHelper::cancel();

		$this->assignRef('category', $category);

		parent::display($tpl);
	}
}
