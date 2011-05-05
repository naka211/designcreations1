<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class EcommerceViewList extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $ecom_config;
		$model = &$this->getModel();
		
		$list = $model->getList();	
		$sotrang = $model->getSotrang();
		$tht = $model->getTrangHienTai();
		$catid = $model->getcatid();
		$page = $model->getPagination();
		$catinfo=$model->getCatInfo();
			
		$this->assignRef('list', $list);
		$this->assignRef('config', $ecom_config);
		$this->assignRef('sotrang', $sotrang);
		$this->assignRef('tht' , $tht);
		$this->assignRef('catid', $catid);
		$this->assignRef('page', $page);
		$this->assignRef('totalresult', $model->getTotalResult());
		$this->assignRef('issearch', $model->getIsSearch());
		$this->assignRef('catinfo', $catinfo );
		$this->assignRef('keyword', $model->_keyword);
		$this->assignRef('params', $model->getParams());
		parent::display($tpl);	
	}
}
?>