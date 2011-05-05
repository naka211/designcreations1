<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');

class EcommerceViewDetail extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		$model = &$this->getModel();	
		$detail = $model->getDetail();
		$topics = $model->getTopics();
		$params = $model->getParams();
		
		$this->assignRef('detail', $detail);
		$this->assignRef('topics', $topics);
		$this->assignRef('params', $params);
	    $document = JFactory::getDocument();$document->setTitle($detail->name." | ".$detail->cat_name);
		parent::display($tpl);
	}
}
?>