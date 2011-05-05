<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class EcommerceControllerCompanies extends JController
{
	function __construct( $default = array())
	{
		parent::__construct( $default );
		$this->registerTask( 'add', 'edit' );
	}

	function display() 
	{
	   parent::display();
	}
  
	/**
	 * display the edit form
	 * @return void
	 */
	function edit()
	{
		JRequest::setVar( 'view', 'company' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('company');
		if ($model->store()) {
			$msg = JText::_( 'Company Saved' );
		} else {
			$msg = JText::_( 'Error Saving Company' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_ecommerce&controller=companies';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('company');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot deleted' );
		} else {
			$msg = JText::_( 'Comapny Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies', $msg );
	}
	
	function publishcat() {
		$model = $this->getModel('company');
		$model->publish(1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies', $msg );
	}
	
	function unpublishcat() {
		$model = $this->getModel('company');
		$model->publish(0);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies', $msg );
	}

	function orderup() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('company');
		$model->orderSection( $cid[0], -1 );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies' );
	}

	function orderdown() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('company');
		$model->orderSection( $cid[0], 1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies' );
	}

	function saveorder() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('company');
		$model->saveOrder( $cid );
		$msg 	= JText::_( 'New ordering saved' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=companies', $msg );
	}


}
?>
