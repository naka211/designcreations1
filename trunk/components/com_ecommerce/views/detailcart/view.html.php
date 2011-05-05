<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewDetailcart extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$model = &$this->getModel();
		
		$lists = $model->getList();	
		$username = $model->getUser('username');			
		$this->assignRef('lists', $lists);		
		$this->assignRef('username', $username);	
		parent::display($tpl);
	}
}
?>