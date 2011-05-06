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
	
	function addcart_package(){
		print_r($_POST);exit();
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
	$letter = JRequest::getVar('letter');
	$brochure = JRequest::getVar('brochure');
	
	$request_file = $_FILES['request_file']['name'];
	$logo_file = $_FILES['logo_file']['name'];
	
	if($id){
		$kt=0;
		
		for($i=0; $i<=intval($session->get('subtotal')); $i ++ ){
			
			if($id == intval($session->get('id'.$i))){
				$kt=1;
				break;
			}
		}
		if($kt==0){
			
			$query = "select * from #__pr_product where id = ". $product_id;
			$db->setQuery($query);
			$row = $db->loadObject();
			
			$subtotal = intval($session->get('subtotal'));
			$subtotal = $subtotal + 1 ;
			$session->set('subtotal', $subtotal);

			$i=intval($session->get('tongsl'));
			
			if($request_file){
				$typeArrRequest = array("application/pdf","image/jpeg");
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
				$typeArrLogo = array("application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.openxmlformats-officedocument.presentationml.presentation", "application/vnd.ms-powerpoint");
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
				if(!move_uploaded_file($_FILES['logo_file']['tmp_name'],"tmp/".$request_file_name)){echo '<script>alert("fejl i upload-processen");window.history.go(-1);</script>';
					exit();}
			}
			
			$session->set('id'.$i, $id);
			$session->set('name'.$i, $name);
			$session->set('price'.$i, $price);
			$session->set('logo_name'.$i, $logo_name);
			$session->set('slogan'.$i, $slogan);
			$session->set('profession'.$i, $profession);
			$session->set('info'.$i, $info);
			$session->set('card'.$i, $card);
			$session->set('letter'.$i, $letter);
			$session->set('brochure'.$i, $brochure);
			$session->set('request_file'.$i, $request_file_name);
			$session->set('logo_file'.$i, $logo_file);
			$session->set('quantity'.$i, 1);
		}
		else {
			$sl = $session->get('quantity'.$i) + 1;
			$session->set('quantity'.$i, $sl);
		}	
	}
	
	$this->setRedirect("index.php?option=com_ecommerce&task=viewcart");
}

function change_curency(){
	$session =& JFactory::getSession();
	$curency = JRequest::getVar('curency',"VND");
	$session->set('curency', $curency);
	$url = JRequest::getVar("return_url");
	$url = base64_decode($url); 
	$this->setRedirect($url);
}

function viewcart(){
	$session =& JFactory::getSession();
	if($ecom_config==NULL) $ecom_config = $this->getConfig();
	//print_r($ecom_config);exit();
	//$session->destroy();
	require_once(JPATH_COMPONENT . DS . "view" . DS . "basket.php");
}

function updatecart(){
	global $ecom_config;
	$session =& JFactory::getSession();
	for ($i=1; $i<= intval($session->get('tongsl')); $i++){
		if(JRequest::getVar('C'.$i)==""){
			$session->set('soluong'.$i , 1);
		} else {
			$session->set('soluong'.$i , JRequest::getVar('C'.$i));
		}
	}
	if($ecom_config==NULL) $ecom_config = $this->getConfig();
	require_once(JPATH_COMPONENT . DS . "view" . DS . "cart" . DS . "viewcart.php");
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
		$session->set('letter'.$i, $session->get('letter'.$j));
		$session->set('brochure'.$i, $session->get('brochure'.$j));
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

	require_once(JPATH_COMPONENT . DS . "view" . DS . "basket.php");
}

function payment(){
	$user = & JFactory::getUser();
	$session =& JFactory::getSession(); 
	$type = (!$user->get('guest')) ? 'logged' : '';
	if($type=='logged' && $session->get('tongsl')>0)
	{
		$db		= &JFactory::getDBO();
		$session =& JFactory::getSession();
		
		$user = & JFactory::getUser();
		$user_id = $user->get('id');
	
		$order_contact_name = JRequest::getVar('order_contact_name','');
		$order_address = JRequest::getVar('order_address','');	
		$order_phone = JRequest::getVar('order_phone','');	
		$order_fax = JRequest::getVar('order_fax','');	
		$order_email = JRequest::getVar('order_email','');
		$order_info = JRequest::getVar('order_info','');
		$order_method = JRequest::getVar('order_method',3);
		
		$query = "insert into #__pr_orders(order_date, order_user_id,order_contact_name,order_address,order_phone,order_fax,order_email,order_info,order_method) value(now() ,$user_id,'$order_contact_name','$order_address','$order_phone','$order_fax','$order_email','$order_info','$order_method')";
		$db->setQuery($query);
		$db->query();
		$order_id = $db->insertid();
		
		$order_total=0;
		for($i=1 ; $i<= $session->get('tongsl'); $i ++)
		{
			$product_id = $session->get('mahang'.$i) ;
			$product_name = $session->get('tenhang'.$i) ;
			$quantity =  $session->get('soluong'.$i) ;
			$price = $session->get('gia'.$i) ;
			$total = $price*$quantity ;
			$order_total +=$total;
			$query_customer = "insert into #__pr_cart(order_id, product_id, product_name, quantity ,  price , total ) value($order_id,$product_id , '$product_name',$quantity ,$price,$total)";
			
			$db->setQuery($query_customer);
			$db->query();
			
			$query="update #__pr_product set shopped = shopped + 1 where id = " . $product_id;
			$db->setQuery($query);
			$db->query();
		}
		$query = "UPDATE #__pr_orders set order_total = $order_total where order_id = $order_id ";
		$db->setQuery($query);
		$db->query();
		
		
				
		//Send Email
		$mail = new JConfig();
		$to = $mail->mailfrom; // email admin
		$subject = "Đơn đặt hàng số ".$order_id;;
		$body = "Thông tin người mua hàng";
		$body .= "<br /> Họ tên người nhận: ".$order_contact_name;
		$body .= "<br /> Địa chỉ : ". $order_address;
		$body .= "<br /> Email : ". $order_email;
		$body .= "<br /> Thông tin xuất hóa đơn : ". $order_info;
		$body .= "<br /> Điện thoại : ". $order_phone;
		$body .= "<br /> Vui lòng vào nhấp vào <a href='http://www.hoanlongcomputer.com/administrator/index.php?option=com_ecommerce&controller=orders'>http://www.hoanlongcomputer.com/administrator/index.php?option=com_ecommerce&controller=orders</a> để xem chi tiết";
		
		$config =& JFactory::getConfig();
		
		$message =& JFactory::getMailer();
		$message->IsHTML(true);
		$message->addRecipient($to); //nguoi nhan mail
		$message->setSubject($subject); // tieu de
		$message->setBody($body); // noi dung mail
		$sender = array( $mail->mailfrom, $config->sitename ); // email he thong
		$message->setSender($sender);
		$sent = $message->send();
		
		// Ket noi ngan luong hoac paypal
		if ( ($order_method == 1) && ( $session->get("curency")=="USD") ){
			if($ecom_config==NULL) $ecom_config = $this->getConfig();
			require_once(JPATH_COMPONENT . DS . "view" . DS . "order" . DS . "paypal.php");
			//$session->set('tongsl',0);
				
		}
		elseif ($order_method == 1){
			// khoi tao session de xac minh thanh toan thanh cong;
			
			$order_code = $order_id;
			$price = $order_total;
						
			// lay thong so truyen cho Ngan luong
			$return_url = JRoute::_('index.php?option=com_ecommerce&task=verify_payment');			
			$return_url = "http://".$_SERVER['HTTP_HOST'].$return_url;
			$receiver = "kinhdoanh2000laptop@gmail.com"; // tai khoan chu cua hang 
			$transaction_info = 'Don hang cua user:'.$order_contact_name; // thong tin don hang
			// thoi gian la ma don hang
				
			// Khoi tao doi tuong de lay URL truyen di
			$NL_checkout = new NL_Checkout;
			$link_nganluong  = $NL_checkout->buildCheckoutUrl($return_url, $receiver, $transaction_info, $order_code, $price);
			//die($return_url );
			//die($link_nganluong."Da luu thong tin hoa don, chi con chuyen thanh toan sang ngan luong");
			//$session->set('tongsl',0);
			header("location:$link_nganluong");
		
		}
		else if($order_method == 2 || $order_method == 3)
		{
			$this->setRedirect("index.php?option=com_content&view=article&id=13");
		}
		
	}
	else
	{
		 $this->setRedirect("index.php?option=com_user&view=login","Vui lòng đăng nhập để có thể mua hàng Online","notice");
	}
}

function verify_payment()
{
	$verify = new NL_Checkout;
	
	$transaction_info = JRequest::getVar('transaction_info');
	$order_code = JRequest::getVar('order_code');
	$price = JRequest::getVar('price');
	$payment_id = JRequest::getVar('payment_id');
	$payment_type = JRequest::getVar('payment_type');
	$error_text = JRequest::getVar('error_text');
	
	$result = $verify->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
	if($result)
	{
		$this->setRedirect("index.php?option=com_content&view=article&id=12");
	}
	else
	{
		$this->setRedirect("index.php?option=com_ecommerce&view=orders", "Có lỗi trong quá trình thanh toán, xin quý khách vui lòng chọn hàng và thanh toán lại", "error");
	}
}
function check(){
	$session =& JFactory::getSession(); 
	$user = & JFactory::getUser();
	$type = (!$user->get('guest')) ? 'logged' : 'guest';
	if($type=='guest'){
		// die($this->return());
		$uri = JFactory::getURI();
		$url = $uri->toString(array('path', 'query', 'fragment'));
		$return=base64_encode($url);
		$this->setRedirect("index.php?option=com_user&view=login&return=$return","Vui l&ograve;ng &#273;&#259;ng nh&#7853;p &#273;&#7875; c&oacute; th&#7875; mua h&agrave;ng Online","notice");
	}
	
	if($session->get('tongsl')<1)
	{
		$this->setRedirect("index.php?option=com_ecommerce&task=addcart","Giỏ hàng của bạn không có sản phẩm nào. Bạn chưa thể đặt mua hàng được","error");
	}
}	
function order(){
	global $ecom_config;
	if($ecom_config==NULL) $ecom_config = $this->getConfig();
	$session =& JFactory::getSession(); 
	$this->check();
	
	
	
	if(!JRequest::getVar('submit',0)){
		$order_contact_name = $session->get('order_contact_name','');
		$order_address = $session->get('order_address','');	
		$order_phone = $session->get('order_phone','');	
		$order_fax = $session->get('order_fax','');	
		$order_email = $session->get('order_email','');
		$order_info = $session->get('order_info','');
		$order_method = $session->get('order_method',0);
		require_once(JPATH_COMPONENT . DS . "view" . DS . "order" . DS . "default.php");
	}
	else{
		$order_contact_name = JRequest::getVar('order_contact_name','');
		$order_address = JRequest::getVar('order_address','');	
		$order_phone = JRequest::getVar('order_phone','');	
		$order_fax = JRequest::getVar('order_fax','');	
		$order_email = JRequest::getVar('order_email','');
		$order_info = JRequest::getVar('order_info','');
		$order_method = JRequest::getVar('order_method',0);	
		if(! $order_contact_name || !$order_address || !$order_phone || !$order_method)	{
			$this->setRedirect("index.php?option=com_ecommerce&task=order","Vui lòng nhập đầy đủ các thông tin bắt buộc","error");
		}
		else{
			$session->set('order_contact_name', $order_contact_name);
			$session->set('order_address', $order_address);	
			$session->set('order_phone', $order_phone);	
			$session->set('order_fax', $order_fax);	
			$session->set('order_email', $order_email);
			$session->set('order_info', $order_info);
			$session->set('order_method', $order_method);	
			//require_once(JPATH_COMPONENT . DS . "view" . DS . "order" . DS . "confirm.php");
			$this->setRedirect("index.php?option=com_ecommerce&task=confirm");
			
		}			
	}
}

function confirm(){
	global $ecom_config;
	$this->check();
	
	if($ecom_config==NULL) $ecom_config = $this->getConfig();
	$session =& JFactory::getSession();
	
	$order_contact_name = $session->get('order_contact_name','');
	$order_address = $session->get('order_address','');	
	$order_phone = $session->get('order_phone','');	
	$order_fax = $session->get('order_fax','');	
	$order_email = $session->get('order_email','');
	$order_info = $session->get('order_info','');
	$order_method = $session->get('order_method',0);	
	if(! $order_contact_name || !$order_address || !$order_phone || !$order_method)	{
		$this->setRedirect("index.php?option=com_ecommerce&task=order","Vui lòng nhập đầy đủ các thông tin bắt buộc","error");
	}
	require_once(JPATH_COMPONENT . DS . "view" . DS . "order" . DS . "confirm.php");
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