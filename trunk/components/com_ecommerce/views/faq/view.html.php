<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewFaq extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $ecom_config;
		$model = &$this->getModel();
		
		$contents = $model->getList();	
				
		$this->assignRef('contents', $contents);
		
		parent::display($tpl);	
	}
}
?>