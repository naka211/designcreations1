<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );

class EcommerceControllerCategories extends JController
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
		JRequest::setVar( 'view', 'category' );
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
		$model = $this->getModel('category');
		if ($model->store()) {
			//die($model->insertid." no do");
			$msg = JText::_( 'category Saved' );
		} else {
			$msg = JText::_( 'Error Saving category' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_ecommerce&controller=categories';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('category');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot deleted' );
		} else {
			$msg = JText::_( 'category Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories', $msg );
	}
	
	function publishcat() {
		$model = $this->getModel('category');
		$model->publish(1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories', $msg );
	}
	
	function unpublishcat() {
		$model = $this->getModel('category');
		$model->publish(0);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories', $msg );
	}

	function orderup() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('category');
		$model->orderSection( $cid[0], -1 );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories' );
	}

	function orderdown() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('category');
		$model->orderSection( $cid[0], 1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories' );
	}

	function saveorder() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('category');
		$model->saveOrder( $cid );
		$msg 	= JText::_( 'New ordering saved' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=categories', $msg );
	}


}
?>
