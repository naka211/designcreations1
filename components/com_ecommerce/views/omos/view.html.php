<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewOmos extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $ecom_config;
				
		parent::display($tpl);	
	}
}
?>