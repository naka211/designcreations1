<div class="col2_box">
<div class="col2_box_header"><span> </span>Thông báo từ website</div>
<div class="col2_box_content">

<div class="cb h_10"></div>
<div class="pro_name_more"><strong>Đang chuyển dữ liệu sang Paypal để thực hiện thanh toán. Xin vui lòng đợi . . .</strong></div>
<div class="line_dotted"></div>
<div class="cb h_10"></div>


<form action="https://www.paypal.com/cgi-bin/webscr" accept-charset="UTF-8" method="post" name="paypal_form" id="paypal_form" >
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="charset" value="utf-8"/>
<input type="hidden" name="form-charset" value="utf-8"/>
<input type="hidden" name="business" value="ngocdiem@hoatuoinhatque.com">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="" />
<input type="hidden" name="cancel_return" value="" />
<input type="hidden" name="image_url" value="<?php echo JURI::base();?>/images/banner.jpg" />

	<?php
	$session =& JFactory::getSession();
	$curency = $session->get("curency"); 
	$this->config = $ecom_config; 
	if($curency=="USD"){ 
		$rate = $this->config["USD"]["value"]; $decimal = 2;
		
	}
	else { $rate = 1; $decimal = -3;}
	$tong_tien=0;
	if($session->get('tongsl')>0){
		for ($i=1; $i<=$session->get('tongsl'); $i++) {
			$price = $session->get('gia'.$i) ;
			if($curency=="USD" && $price>0){
				$price = $price/$rate ;
				$price = ( $price/(1-$this->config["percent_payment"]["value"]/100) )+ $this->config["transaction_fee"]["value"];
			}
		?>
        		<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $session->get('tenhang'.$i); ?>">
               
                <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $session->get('soluong'.$i); ?>" />
                <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo number_format($price ,$decimal,'.',',') ; ?>">
				
		<?php
		$tong_tien += $price * $session->get('soluong'.$i);
		}
	}
	?>
    <input type="hidden" name="amount" value="<?php echo number_format($tong_tien,$decimal,'.',',') ?>">
</form>

</div>
<div class="col2_box_footer"></div>
</div>
<script language="javascript" type="text/javascript">
	$("paypal_form").submit();
</script>
