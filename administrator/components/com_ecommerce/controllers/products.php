<?php

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.controller' );
require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . "libs" . DS . "functions.php");

class EcommerceControllerProducts extends EcommerceController
{
	
	function __construct( $default = array())
	{
		parent::__construct( $default );
		$this->registerTask( 'add', 'edit' );
	  	
	}
	
	function display() 
	{
	  	parent::display();
		JToolBarHelper::preferences('com_ecommerce', '200');
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
		JRequest::setVar( 'view', 'product' );
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
		$model = $this->getModel('product');
		if ($model->store()) {
			$msg = JText::_( 'Prooduct Saved' );
		} else {
			$msg = JText::_( 'Error Saving Product' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$link = 'index.php?option=com_ecommerce&controller=products';
		$this->setRedirect($link, $msg);
	}

	/**
	 * remove record(s)
	 * @return void
	 */
	function remove()
	{
		$model = $this->getModel('product');
		if(!$model->delete()) {
			$msg = JText::_( 'Error, cannot deleted' );
		} else {
			$msg = JText::_( 'product Deleted!' );
		}
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}

	/**
	 * cancel editing a record
	 * @return void
	 */
	function cancel()
	{
		$msg = JText::_( 'Operation Cancelled' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}
	
	function publishcat() {
		$model = $this->getModel('product');
		$model->publish(1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}
	
	function unpublishcat() {
		$model = $this->getModel('product');
		$model->publish(0);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}
	
	function NewProduct() {
		$model = $this->getModel('product');
		$model->setNew(1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}
	
	function unNewProduct() {
		$model = $this->getModel('product');
		$model->setNew(0);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}

	function orderup() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('product');
		$model->orderSection( $cid[0], -1 );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products' );
	}

	function orderdown() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('product');
		$model->orderSection( $cid[0], 1);
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products' );
	}

	function saveorder() {
		$cid = JRequest::getVar( 'cid', array(0), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		$model = $this->getModel('product');
		$model->saveOrder( $cid );
		$msg 	= JText::_( 'New ordering saved' );
		$this->setRedirect( 'index.php?option=com_ecommerce&controller=products', $msg );
	}
	
	function export_excel() {
	
		$db =& JFactory::getDBO();
		

		$html = "<?xml version='1.0'?>
				<?mso-application progid='Excel.Sheet'?>
				<Workbook xmlns='urn:schemas-microsoft-com:office:spreadsheet' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel' xmlns:ss='urn:schemas-microsoft-com:office:spreadsheet' xmlns:html='http://www.w3.org/TR/REC-html40'>
				<Worksheet ss:Name='banggia'>
				<Table x:FullColumns=\"1\"
   x:FullRows=\"1\"> <Column ss:Index=\"2\" ss:Width=\"571.5\"/>
       <Row>
	  <Cell><Data ss:Type=\"String\">ID</Data></Cell>
	  <Cell><Data ss:Type=\"String\">Ten san pham</Data></Cell>
	  <Cell><Data ss:Type=\"String\">Gia</Data></Cell>
	  </Row>

   ";
		$query = "SELECT A.id,A.name,A.price FROM #__pr_product A, #__pr_category B where A.category_id = B.id ORDER BY category_id";
		$db->setQuery($query);
		$products = $db->loadObjectList();
		
		header("Content-type: charset=UTF-8");
		header("Content-type: application/vnd.ms-excel");
		header('Content-Disposition: attachment;filename="banggia-'.date("d-m-Y").'.xml"');
		header("Pragma: no-cache");
		header("Expires: 0");
		header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
		header("Pragma: public"); 
		echo $html ;
		
		$nums = count($products);
		for ($i=0; $i<$nums; $i++){
			echo "<Row><Cell><Data ss:Type='Number'>".$products[$i]->id."</Data></Cell><Cell><Data ss:Type='String'>". htmlspecialchars($products[$i]->name)."</Data></Cell><Cell><Data ss:Type='Number'>". doubleval($products[$i]->price)."</Data></Cell></Row>\n";
			//if($i==5) break;
		}
		
		echo "</Table></Worksheet></Workbook>";
		exit();
	}
	
	
	
	function import_excel()
	{
		if ( $_FILES['fileExcel']['tmp_name'] )
		{	
			$this->_db =& JFactory::getDBO();
			$dom = DOMDocument::load( $_FILES['fileExcel']['tmp_name'] );
			$rows = $dom->getElementsByTagName( 'Row' );
			$first_row = 0;
			foreach ($rows as $row)
			{
				if ( $first_row > 0)
				{
					$id = "";
					$name = "";
					$price = "";
					$index = 1;
					$cells = $row->getElementsByTagName( 'Cell' );
					foreach( $cells as $cell )
					{ 
						$key ="";
						if ( $index == 1 ) $key= 'id';
						if ( $index == 2 ) $key= 'name';
						if ( $index == 3 ) $key= 'price';
						
						$$key =  $cell->nodeValue;
						$index += 1;
					}
					$id = intval($id) ;
					$price =  doubleval($price) ;
					if(  $id  && $price )
					{
						$query = "update  #__pr_product set price = $price where id= $id";
						$this->_db->setQuery($query);
						$this->_db->query();
					}
				}
				$first_row++ ;
			}
			die("Đã cap nhat  thành công  gia cua ".($first_row-1) ."san pham");
		}
		else
		{
			parent::display();
		}			
	}
}
?>
