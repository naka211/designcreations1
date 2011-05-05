<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class EcommerceViewConfig extends JView
{
	function display($tpl = null)
	{
		$model = $this->getModel('Config');
		$config = &$model->getConfig();
				
		JToolBarHelper::title( JText::_( 'Configuaration' ) );

		//JToolBarHelper::custom('autoupdate', 'autoupdate.png', 'autoupdate.png', 'Cập nhật tỷ giá', false, false);
		JToolBarHelper::save();
		JToolBarHelper::cancel( 'cancel', 'close' );

		$this->assignRef('config', $config);

		parent::display($tpl);
	}
}