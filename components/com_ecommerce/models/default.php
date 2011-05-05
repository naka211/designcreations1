<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_ecommerce'.DS.'tables');	

class EcommerceModelDefault extends JModel
{
	
	function __construct()
	{
		parent::__construct();
	}
	
}
?>