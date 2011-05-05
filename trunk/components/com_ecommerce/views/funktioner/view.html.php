<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');

class EcommerceViewFunktioner extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $ecom_config;
		
		parent::display($tpl);	
	}
}
?>