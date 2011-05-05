<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . "models" . DS . "categories.php");
class EcommerceViewProduct extends JView
{
	function display($tpl = null)
	{
		$model = $this->getModel('product','EcommerceModel');
		$product =$model->getData();
		$EcommerceModelCategories = new EcommerceModelCategories();
		
		$catoption = $EcommerceModelCategories->genOptioncat(0,'',true,$product->category_id);
		
		
		JToolBarHelper::title( JText::_( 'Product infomation' ) );

		JToolBarHelper::save();
		JToolBarHelper::cancel( 'cancel', 'close' );

		$this->assignRef('product', $product);
		$this->assignRef('catoption', $catoption);		
		
		parent::display($tpl);
	}
}