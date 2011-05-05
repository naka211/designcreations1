<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class ImagesViewPortefolje extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $ecom_config;
		$model = &$this->getModel();
		
		$logos = $model->getLogo();
		$cards = $model->getCard();
		$letters = $model->getLetter();
		$brochures = $model->getBrochure();
		$pagetotal = $model->getPageTotal();
		
		$this->assignRef('logos', $logos);
		$this->assignRef('cards', $cards);
		$this->assignRef('letters', $letters);
		$this->assignRef('brochures', $brochures);
		$this->assignRef('pagetotal', $pagetotal);
		
		parent::display($tpl);	
	}
}
?>