<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class EcommerceController extends JController
{

	
	function display()
	{
		global $ecom_config;
		if($ecom_config==NULL) $ecom_config = $this->getConfig();
		parent::display();
	}
	
	function pakkeform(){
		$db = &JFactory::getDBO();
		$query = "SELECT id,name,promotion_price,price FROM #__pr_product WHERE id = ".JRequest::getVar('id');
		$db->setQuery($query);
		$package = $db->loadObject();
		
		require_once(JPATH_COMPONENT . DS . "view" . DS . "pakkeform.php");
	}
	
	function addcart(){
		global $ecom_config;
		$db = &JFactory::getDBO();
		
		$session =& JFactory::getSession();
		
		$id = intval( JRequest::getVar('id') );
		$name = JRequest::getVar('name');
		$price = JRequest::getVar('price');
		
		$logo_name = JRequest::getVar('logo_name');
		$slogan = JRequest::getVar('slogan');
		$profession = JRequest::getVar('profession');
		$info = JRequest::getVar('info');
		
		$card = JRequest::getVar('card');
		$CMS = JRequest::getVar('CMS');
		$imageName = JRequest::getVar('imageName');
		
		$request_file = $_FILES['request_file']['name'];
		$logo_file = $_FILES['logo_file']['name'];
		//print_r($request_file);exit();
		/*if($id){
			$kt=0;
			
			for($i=0; $i<intval($session->get('subtotal')); $i ++ ){
				
				if($id == intval($session->get('id'.$i))){
					$kt=1;
					break;
				}
			}
			print_r($i);exit();
			if($kt==0){*/
				
				if($request_file){
					$typeArrRequest = array("application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/vnd.ms-powerpoint");
					if(!in_array($_FILES['request_file']['type'],$typeArrRequest)){
						echo '<script>alert("Fil forlængelse ikke tilladt at uploade");window.history.go(-1);</script>';
						exit();
					}
					if($_FILES['request_file']['size'] > 5242880){
						echo '<script>alert("Filstørrelse er for stor");window.history.go(-1);</script>';
						exit();
					}
					$rand = mt_rand();
					$request_file_name = $rand.$_FILES['request_file']['name'];
					if(!move_uploaded_file($_FILES['request_file']['tmp_name'],"tmp/".$request_file_name)){echo '<script>alert("fejl i upload-processen");window.history.go(-1);</script>';
						exit();}
				}
				//print_r($_FILES['logo_file']);exit();
				if($logo_file){
					$typeArrLogo = array("application/pdf", "image/jpeg", "application/postscript", "application/octet-stream", "image/svg+xml");
					if(!in_array($_FILES['logo_file']['type'],$typeArrLogo)){
						echo '<script>alert("Fil forlængelse ikke tilladt at uploade");window.history.go(-1);</script>';
						exit();
					}
					if($_FILES['logo_file']['size'] > 5242880){
						echo '<script>alert("Filstørrelse er for stor");window.history.go(-1);</script>';
						exit();
					}
					$rand = mt_rand();
					$logo_file_name = $rand.$_FILES['logo_file']['name'];
					if(!move_uploaded_file($_FILES['logo_file']['tmp_name'],"tmp/".$logo_file_name)){echo '<script>alert("fejl i upload-processen");window.history.go(-1);</script>';
						exit();}
				}
				
				/*$query = "SELECT * FROM #__pr_product WHERE id = ". $product_id;
				$db->setQuery($query);
				$row = $db->loadObject();*/
				
				$subtotal = intval($session->get('subtotal'));
				$subtotal = $subtotal + 1 ;
				$session->set('subtotal', $subtotal);
	
				$i=intval($session->get('subtotal'));
							
				$session->set('id'.$i, $id);
				$session->set('name'.$i, $name);
				$session->set('price'.$i, $price);
				$session->set('logo_name'.$i, $logo_name);
				$session->set('slogan'.$i, $slogan);
				$session->set('profession'.$i, $profession);
				$session->set('info'.$i, $info);
				$session->set('card'.$i, $card);
				$session->set('CMS'.$i, $CMS);
				$session->set('imageName'.$i, $imageName);
				$session->set('request_file'.$i, $request_file_name);
				$session->set('logo_file'.$i, $logo_file_name);
				$session->set('quantity'.$i, 1);
			/*}
			else {
				$sl = $session->get('quantity'.$i) + 1;
				$session->set('quantity'.$i, $sl);
			}*/
			
			$session->set('subprice',$session->get('subprice') + $price);
		//}
		if(JRequest::getVar('action')){
			$this->setRedirect("index.php");
		} else {
			$this->setRedirect("index.php?option=com_ecommerce&task=kurv");
		}
	}

	function kurv(){
		$session =& JFactory::getSession();
		if($ecom_config==NULL) $ecom_config = $this->getConfig();
		//print_r($session->get('subtotal'));exit();
		//$session->destroy();
		require_once(JPATH_COMPONENT . DS . "view" . DS . "kurv.php");
	}

	function delcart(){
		$session =& JFactory::getSession();
		
		for ($i= intval(JRequest::getVar('i')); $i< intval($session->get('subtotal')); $i++){
			$j = $i+1;
			$session->set('id'.$i, $session->get('id'.$j));
			$session->set('name'.$i, $session->get('name'.$j));
			$session->set('quantity'.$i, $session->get('quantity'.$j));
			$session->set('price'.$i, $session->get('price'.$j));
			
			$session->set('logo_name'.$i, $session->get('logo_name'.$j));
			$session->set('slogan'.$i, $session->get('slogan'.$j));
			$session->set('profession'.$i, $session->get('profession'.$j));
			$session->set('info'.$i, $session->get('info'.$j));
			$session->set('card'.$i, $session->get('card'.$j));
			$session->set('CMS'.$i, $session->get('CMS'.$j));
			$session->set('imageName'.$i, $session->get('imageName'.$j));
			if($session->get('logo_file'.$i)){
				unlink("tmp/".$session->get('logo_file'.$i));
			}
			$session->set('logo_file'.$i, $session->get('logo_file'.$j));
			if($session->get('request_file'.$i)){
				unlink("tmp/".$session->get('request_file'.$i));
			}
			$session->set('request_file'.$i, $session->get('request_file'.$j));
		}
		$current_tongsl = intval($session->get('subtotal')) - 1;
		$session->set('subtotal', $current_tongsl);
	
		require_once(JPATH_COMPONENT . DS . "view" . DS . "kurv.php");
	}

	function levering(){
		global $ecom_config;
		if($ecom_config==NULL) $ecom_config = $this->getConfig();
		$session =& JFactory::getSession(); 
		$db = &JFactory::getDBO();
		
		if(!JRequest::getVar('submit1',0)){
			$order_name 	= $session->get('order_name','');
			$order_address 	= $session->get('order_address','');	
			$order_phone	= $session->get('order_phone','');	
			$order_zipcode 	= $session->get('order_zipcode','');
			$order_city 	= $session->get('order_city','');	
			$order_country 	= $session->get('order_country','');	
			$order_email 	= $session->get('order_email','');
			$order_comment 	= $session->get('order_comment','');
			
			/*$order_format_eps 	= $session->get('order_format_eps','');
			$order_format_ai 	= $session->get('order_format_ai','');
			$order_format_psd 	= $session->get('order_format_psd','');
			$order_format_pdf 	= $session->get('order_format_pdf','');
			$order_format_tiff 	= $session->get('order_format_tiff','');
			$order_format_jpg 	= $session->get('order_format_jpg','');
			$order_format_png 	= $session->get('order_format_png','');
			$order_format_gif 	= $session->get('order_format_gif','');
			
			$order_via_email = $session->get('order_via_email',0);
			$order_via_host = $session->get('order_via_host',0);*/
			
			require_once(JPATH_COMPONENT . DS . "view" . DS . "levering.php");
		}
		else{
			$order_name 		= JRequest::getVar('order_name','');
			$order_address 	 = JRequest::getVar('order_address','');	
			$order_phone 		= JRequest::getVar('order_phone','');	
			$order_zipcode 	= JRequest::getVar('order_zipcode','');	
			$order_city 		= JRequest::getVar('order_city','');	
			$order_country 	= JRequest::getVar('order_country','');	
			$order_email 		= JRequest::getVar('order_email','');
			$order_comment 	= JRequest::getVar('order_comment','');
			
			/*$order_format_eps 	= JRequest::getVar('order_format_eps',0);
			$order_format_ai 	= JRequest::getVar('order_format_ai',0);
			$order_format_psd 	= JRequest::getVar('order_format_psd',0);
			$order_format_pdf 	= JRequest::getVar('order_format_pdf',0);
			$order_format_tiff 	= JRequest::getVar('order_format_tiff',0);
			$order_format_jpg 	= JRequest::getVar('order_format_jpg',0);
			$order_format_png 	= JRequest::getVar('order_format_png',0);
			$order_format_gif 	= JRequest::getVar('order_format_gif',0);
			
			$order_via_email 	= JRequest::getVar('order_via_email',0);
			$order_via_host 	= JRequest::getVar('order_via_host',0);*/
			
			$session->set('order_name', $order_name);
			$session->set('order_address', $order_address);	
			$session->set('order_phone', $order_phone);	
			$session->set('order_zipcode', $order_zipcode);
			$session->set('order_city', $order_city);	
			$session->set('order_country', $order_country);	
			$session->set('order_email', $order_email);
			$session->set('order_comment', $order_comment);
			
			/*$session->set('order_format_eps', $order_format_eps);
			$session->set('order_format_ai', $order_format_ai);
			$session->set('order_format_psd', $order_format_psd);
			$session->set('order_format_pdf', $order_format_pdf);
			$session->set('order_format_tiff', $order_format_tiff);
			$session->set('order_format_jpg', $order_format_jpg);
			$session->set('order_format_png', $order_format_png);
			$session->set('order_format_gif', $order_format_gif);
			
			$session->set('order_via_email', $order_via_email);
			$session->set('order_via_host', $order_via_host);*/
			//require_once(JPATH_COMPONENT . DS . "view" . DS . "order" . DS . "confirm.php");
			
			//$strFormat = $session->get('strFormat','');
			$subprice = $session->get('subprice','');
			$tax = $subprice * $ecom_config['tax']['value'];
			$session->set('subpay', $subprice + $tax);
			$session->set('tax', $tax);
			
			/*$arrVia = array();
			if($order_via_email) $arrVia[] = $order_via_email;
			if($order_via_host) $arrVia[] = $order_via_host;
			
			$strVia = implode(', ',$arrVia);
			$session->set('strVia', $strVia);
			
			$arrFormat = array();
			if($order_format_eps) $arrFormat[] = $order_format_eps;
			if($order_format_ai) $arrFormat[] = $order_format_ai;
			if($order_format_psd) $arrFormat[] = $order_format_psd;
			if($order_format_pdf) $arrFormat[] = $order_format_pdf;
			if($order_format_tiff) $arrFormat[] = $order_format_tiff;
			if($order_format_jpg) $arrFormat[] = $order_format_jpg;
			if($order_format_png) $arrFormat[] = $order_format_png;
			if($order_format_gif) $arrFormat[] = $order_format_gif;
			
			$strFormat = implode(', ', $arrFormat);
			$session->set('strFormat', $strFormat);*/
			
			$query = "INSERT INTO #__pr_orders_tmp(order_date, order_name, order_address, order_phone, order_zipcode, order_email, order_comment, order_total, order_tax, order_status, order_city, order_country, order_format, order_via) 
			VALUE(now(), '$order_name', '$order_address', '$order_phone', '$order_zipcode', '$order_email', '$order_comment', $subprice, $tax, 1, '$order_city', '$order_country', '$strFormat', '$strVia')";
			$db->setQuery($query);
			$db->query();
			$order_id = $db->insertid();
			$session->set('order_id', $order_id);
			
			$this->setRedirect("index.php?option=com_ecommerce&task=bekraeft");				
		}
	}

function bekraeft(){
	global $ecom_config;
		
	if($ecom_config==NULL) $ecom_config = $this->getConfig();
	$session =& JFactory::getSession();
	
	$order_name		= $session->get('order_name','');
	$order_address 	= $session->get('order_address','');	
	$order_phone 	= $session->get('order_phone','');	
	$order_zipcode 	= $session->get('order_zipcode','');
	$order_city 	= $session->get('order_city','');
	$order_country 	= $session->get('order_country','');
	$order_email 	= $session->get('order_email','');
	$order_comment 	= $session->get('order_comment','');
	
	/*$order_format_eps 	= $session->get('order_format_eps');
	$order_format_ai 	= $session->get('order_format_ai');
	$order_format_psd 	= $session->get('order_format_psd');
	$order_format_pdf 	= $session->get('order_format_pdf');
	$order_format_tiff 	= $session->get('order_format_tiff');
	$order_format_jpg 	= $session->get('order_format_jpg');
	$order_format_png 	= $session->get('order_format_png');
	$order_format_gif 	= $session->get('order_format_gif');
	
	$order_via_email 	= $session->get('order_via_email');
	$order_via_host 	= $session->get('order_via_host');	
		
	$strFormat 	= $session->get('strFormat');
	$strVia 	= $session->get('strVia');*/
	
	$subpay 	= $session->get('subpay');
	$subprice 	= $session->get('subprice');
	$tax 		= $session->get('tax');
	$order_id 	= $session->get('order_id');
		
	require_once(JPATH_COMPONENT . DS . "view" . DS . "bekraeft.php");
}

function kvittering(){
	global $ecom_config;
	if($ecom_config==NULL) $ecom_config = $this->getConfig();
	$session =& JFactory::getSession();
	
	if($session->get('subtotal')>0)
	{
		$db		= &JFactory::getDBO();
		$session =& JFactory::getSession();
		
		$order_id 	= $session->get('order_id');
		
		$query = "INSERT INTO #__pr_orders SELECT * FROM #__pr_orders_tmp WHERE order_id = $order_id";
		$db->setQuery($query);
		if($db->query()){		
			$query = "DELETE FROM #__pr_orders_tmp WHERE order_id = $order_id";
			$db->setQuery($query);
			$db->query();
		}
		
		for($i=1 ; $i<= $session->get('subtotal'); $i ++)
		{
			$id = $session->get('id'.$i) ;
			$name = $session->get('name'.$i) ;
			$quantity =  $session->get('quantity'.$i) ;
			$price = $session->get('price'.$i) ;
			$total = $price*$quantity ;
			
			$logo_name = $session->get('logo_name'.$i) ;
			$slogan = $session->get('slogan'.$i) ;
			$profession = $session->get('profession'.$i) ;
			$info = $session->get('info'.$i) ;
			$card = $session->get('card'.$i) ;
			$CMS = $session->get('CMS'.$i) ;
			$imageName = $session->get('imageName'.$i) ;
			$request_file = $session->get('request_file'.$i) ;
			$logo_file = $session->get('logo_file'.$i) ;
			
			if($request_file){
				$source = 'tmp/'.$request_file;
				$des = 'images/fileupload/'.$request_file;
				copy($source, $des);
				unlink($source);
			}
			
			if($logo_file){
				$source = 'tmp/'.$logo_file;
				$des = 'images/fileupload/'.$logo_file;
				copy($source, $des);
				unlink($source);
			}
			
			$query_customer = "INSERT INTO #__pr_cart(order_id, product_id, product_name, quantity ,  price , total, logo_name, slogan, profession, info, card, CMS, request_file, logo_file ) 
			VALUE($order_id, $id , '$name', $quantity , $price, $total, '$logo_name', '$slogan', '$profession', '$info', '$card', '$CMS', '$request_file', '$logo_file')";
			$db->setQuery($query_customer);
			$db->query();
			
			$query = "UPDATE #__images SET publish = 0 WHERE name = '".$imageName."' AND (catid = 3 OR catid = 4)";
			$db->setQuery($query);
			$db->query();
		}
		
		$db->setQuery("SELECT order_date FROM #__pr_orders WHERE order_id = ".$order_id);
		$order_date = $db->loadResult();
		$tmp = explode(' ',$order_date);
		$tmp1 = explode('-',$tmp[0]);
		//Send Email
		$order_name		= $session->get('order_name','');
		$order_address 	= $session->get('order_address','');	
		$order_phone 	= $session->get('order_phone','');	
		$order_zipcode 	= $session->get('order_zipcode','');
		$order_city 	= $session->get('order_city','');
		$order_country 	= $session->get('order_country','');
		$order_email 	= $session->get('order_email','');
		$order_comment 	= $session->get('order_comment','');
					
		/*$strFormat 	= $session->get('strFormat');
		$strVia 	= $session->get('strVia');*/
		
		$subpay 	= $session->get('subpay');
		$subprice 	= $session->get('subprice');
		$tax 		= $session->get('tax');
		$order_id 	= $session->get('order_id');
	
		$mail = new JConfig();
		$to = $mail->mailfrom; // email admin
		$subject = "Ordrebekræftelse nr. ".$order_id;
		$body = '
			<table width="100%" align="center" border="0" cellspacing="0">
  <tr valign="top"> 
    <td width=53% align="left" class="Stil1"><img src="'.JURI::base().'templates/tpl_designcreations/img/dc_logo.png" alt="vendor_image" border="0" /></td>
    <td width="47%" align="right"></td>
  </tr>
  <tr>
      <td colspan="2" class="Stil1">Tak for Deres ordre. Detaljerne for Deres ordre fremgår af nedenstående</td>
  </tr>    
  <tr bgcolor="white"> 
    <td colspan="2">
      <h3 class="Stil2">Ordrebekræftelse</h3>
    </td>
  </tr>
</table>
 
<table border="0" cellspacing="0" cellpadding="0" width="100%">
   
  <tr bgcolor="#CCCCCC" class="sectiontableheader"> 
    <td colspan="2" class="Stil2"><b>Ordreinformation</b></td>
  </tr>
  <tr class="Stil1"> 
    <td width="35%">Ordre nummer:</td>
	<td  width="65%">'.sprintf('%05d',$order_id).'</td>
  </tr>
   
  <tr class="Stil1"> 
    <td>Ordre dato:</td><td>'.$tmp1[2].'-'.$tmp1[1].'-'.$tmp1[0].'</td>
  </tr>
  
  <tr class="sectiontableheader">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC" class="sectiontableheader"> 
    <td colspan="2"><b class="Stil2">Kundeinformation</b></td>
  </tr>
  <tr valign="top"> 
    <td width="100%" colspan="2">  
      <table width="100%" cellspacing="0" cellpadding="2" border="0">
      	<tr> 
          <td colspan="2"><b>Faktureringsoplysninger</b></td>
        </tr>
        <tr class="Stil1"> 
          <td width="35%">Kundenavn:</td>
          <td width="65%">'.$order_name.'</td>
        </tr>
         <tr class="Stil1"> 
          <td>Adresse:</td>
          <td>'.$order_address.'</td>
        </tr>
         <tr class="Stil1"> 
          <td>Postnummer:</td>
          <td>'.$order_zipcode.'</td>
        </tr>
         <tr class="Stil1"> 
          <td>By:</td>
          <td>'.$order_city.'</td>
        </tr>
         <tr class="Stil1"> 
          <td>Telefon:</td>
          <td>'.$order_phone.'</td>
        </tr>
        <tr class="Stil1"> 
          <td>Email:</td>
          <td><a href="mailto:'.$order_email.'">'.$order_email.'</a></td>
        </tr>
		 <tr class="Stil1"> 
          <td>Kommentar:</td>
          <td>'.$order_comment.'</td>
        </tr>
      </table>
      
    </td>
    <td width="50%"> 
     &nbsp;      
      </td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr bgcolor="#CCCCCC" class="Stil2"> 
    <td colspan="2"><b>Ordrelinier</b></td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <table width="100%" cellspacing="0" cellpadding="2" border="0">
        <tr align="left" class="Stil1">
			<td width="8%" style="border-bottom:1px solid #999;">Antal</th>
	        <td width="46%" style="border-bottom:1px solid #999;">Navn</th>
			<td width="22%" style="border-bottom:1px solid #999;">Pris</th>
			<td width="24%" style="border-bottom:1px solid #999;">Total</th>
        </tr>';
	if($session->get("subtotal")>0){
			for ($i=1; $i<=$session->get('subtotal'); $i++) {
		$body .='
		<tr class="Stil1" align="left">			
			<td>'.$session->get('quantity'.$i).'</th>
			<td>'.$session->get("name".$i).'</th>
			<td>DKK '.$session->get("price".$i).',00</th>
			<td>DKK '.$session->get('price'.$i) * $session->get('quantity'.$i).',00</th>
		</tr>
	   ';
			}	
		}
	
        $body .= '
        <tr class="Stil1"> 
          <td colspan="3" align="right"><strong>Subtotal :</strong></td>
          <td>DKK '.number_format($subprice,2,',','').'</td>
        </tr>
        
        <tr class="Stil1"> 
          <td colspan="3" align="right"><strong>Heraf moms :</strong></td>
          <td>DKK '.number_format($tax,2,',','').'</td>
        </tr>
        <tr class="Stil1"> 
          <td colspan="3" align="right"><b>At betale :</b></td>
          <td>DKK '.number_format($subpay,2,',','').'</td>
        </tr>
      </table>
    </td>
  </tr>  
</table>
		';
		
		
	 	$db->setQuery("SELECT email FROM #__users WHERE id = 62");
		$admin_email = $db->loadResult();
		
		$config =& JFactory::getConfig();
		$mail = new JConfig();
		$message =& JFactory::getMailer();

		$message->IsHTML(true);
		$message->addRecipient($order_email); //nguoi nhan mail
		$message->addCC($admin_email);
		$message->setSubject($subject); // tieu de
		$message->setBody($body); // noi dung mail
		$sender = array( $mail->mailfrom, $config->sitename ); // email he thong
		$message->setSender($sender);
		$sent = $message->send();		
	}
	
	require_once(JPATH_COMPONENT . DS . "view" . DS . "kvittering.php");
}

function getConfig(){
			
			$this->_db		= &JFactory::getDBO();
			if (empty( $this->_config )) 
			{
				$query = ' SELECT * FROM #__pr_config ';
						
				$this->_db->setQuery( $query );
				$this->_config = $this->_db->loadAssocList("name"); 
			}
			return $this->_config;
	}
		
}
?>