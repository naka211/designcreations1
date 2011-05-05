<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewDefault extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$model = &$this->getModel();
		
		parent::display($tpl);
	}
}
?>