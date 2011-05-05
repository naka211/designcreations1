<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewPriser extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $ecom_config;
		$model = &$this->getModel();
		
		$list = $model->getList();	
				
		$this->assignRef('list', $list);
		
		parent::display($tpl);	
	}
}
?>