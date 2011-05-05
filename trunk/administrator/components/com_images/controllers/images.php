<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );
require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . "libs" . DS . "functions.php");

class ImagesControllerImages extends ImagesController
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
	
	function delete_img()
	{
		$db =& JFactory::getDBO();
		
		$id = JRequest::getVar( 'id');
		$hinh = JRequest::getVar( 'hinh');
		
		$query ="SELECT image".$hinh." as image FROM #__pr_product WHERE id = ".$id;
		$db->setQuery($query);
		$product = $db->loadObject();
		
		$prodir = url_prodir($id,1);
		if($hinh == '')
		{
			unlink($prodir.'thumb_'.$product->image);
			unlink($prodir.$product->image);
		}
		else
		{
			unlink($prodir.$product->image);
		}
				
		$query = "UPDATE #__pr_product SET image".$hinh." = '' WHERE id = ".$id;
		$db->setQuery($query);
		if($db->query())
		{
			$this->setRedirect("index.php?option=com_ecommerce&controller=products&task=edit&cid[]=".$id);
		}
		else
		{
			echo "<script> alert('".$db->getErrorMsg()."');window.history.go(-1); </script>\n";
		}

		//echo '{"result":"","message":""}';
	}
  
	/**
	 * display the edit form
	 * @return void
	 */
	 	 
	function edit()
	{
		JRequest::setVar( 'view', 'image' );
		JRequest::setVar('hidemainmenu', 1);

		parent::display();
	}

	/**
	 * save a record (and redirect to main page)
	 * @return void
	 */
	function save()
	{
		$model = $this->getModel('image');
		if ($model->store()) {
			$msg = JText::_( 'Image Saved' );
		} else {
			$msg = JText::_( 'Error Saving Image' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_images&controller=images';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('image');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot deleted' );
		} else {
			$msg = JText::_( 'Image Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_images&controller=images', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_images&controller=images', $msg );
	}
	
	function publishcat() {
		$model = $this->getModel('image');
		$model->publish(1);
		$this->setRedirect( 'index.php?option=com_images&controller=images', $msg );
	}
	
	function unpublishcat() {
		$model = $this->getModel('image');
		$model->publish(0);
		$this->setRedirect( 'index.php?option=com_images&controller=images', $msg );
	}
	
	function orderup() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('image');
		$model->orderSection( $cid[0], -1 );
		$this->setRedirect( 'index.php?option=com_images&controller=images' );
	}

	function orderdown() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('image');
		$model->orderSection( $cid[0], 1);
		$this->setRedirect( 'index.php?option=com_images&controller=images' );
	}

	function saveorder() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('image');
		$model->saveOrder( $cid );
		$msg 	= JText::_( 'New ordering saved' );
		$this->setRedirect( 'index.php?option=com_images&controller=images', $msg );
	}
	
}
?>
