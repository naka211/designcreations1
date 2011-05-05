<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class EcommerceControllerConfig extends EcommerceController
{
	function display() 
	{
	  	parent::display();
	}
	
	function save()
	{
		$model = $this->getModel('config');
		if ($model->store()) {
			$msg = JText::_( 'Config Saved' );
		} else {
			$msg = JText::_( 'Error Saving Config' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_ecommerce&controller=config';
		$this->setRedirect($link, $msg);
	}
	
	function autoupdate()
	{
		$model = $this->getModel('config');
		if($model->autoupdate())
		{
			$msg = JText::_( 'Autoupdate Success' );
		}
		else
		{
			$msg = JText::_( 'Error Autoupdate, try again, please!' );
		}
		$link = "index.php?option=com_ecommerce&controller=config";
		$this->setRedirect($link, $msg);
	}
}
?>
	