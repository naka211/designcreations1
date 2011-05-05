<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class ImagesViewImage extends JView
{
	function display($tpl = null)
	{
		$model = $this->getModel('image','EcommerceModel');
		$image =$model->getData();
				
		JToolBarHelper::title( JText::_( 'Image detail' ) );

		JToolBarHelper::save();
		JToolBarHelper::cancel( 'cancel', 'close' );

		$this->assignRef('image', $image);
		
		parent::display($tpl);
	}
}