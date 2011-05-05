<?php 
	$method = array('',JText::_('PAYMENT_ONLINE'),JText::_('BANK_TRANSFER'),JText::_('CASH_ON_DELIVERY'));
?>

<div class="col2_box">
<div class="col2_box_header"><span> </span><?php echo JText::_('BOOKING_INFO');?></div>
<div class="col2_box_content">

<div class="cb h_10"></div>
<div class="pro_name_more"><strong><?php echo JText::_('CONTACT_INFO');?></strong>:</div>
<div class="line_dotted"></div>
<div class="cb h_10"></div>
<div class="pro_nd_more">
	<strong><?php echo JText::_('YOUR_NAME');?></strong>: <? echo $order_contact_name;?><br />
    <strong><?php echo JText::_('YOUR_ADDRESS');?></strong>: <? echo $order_address;?> <br />
    <strong><?php echo JText::_('PHONE');?></strong>: <? echo $order_phone;?> <br />
    <strong><?php echo JText::_('FAX');?></strong>: <? echo $order_fax;?> <br />
    <strong>Email</strong>: <? echo $order_email;?> <br />
    <strong><?php echo JText::_('PAYMENT_METHOD');?></strong>: <? echo $method[$order_method];?>  
</div>
<div class="cb h_15"></div>
<div class="pro_name_more"><strong><?php echo JText::_('ITEM_DETAILS');?></strong>:</div>
<div class="line_dotted"></div>
<div class="cb h_10"></div>
<form method="post" action="index.php?option=com_ecommerce" name="fr_payment" id="fr_payment">
<input type="hidden" name="order_contact_name"  id="order_contact_name" class="text_box_order" value="<? echo $order_contact_name;?>" />
<input type="hidden" name="order_address" id="order_address" class="text_box_order" value="<? echo $order_address;?>" />
<input type="hidden" name="order_phone" id="order_phone" class="text_box_order" value="<? echo $order_phone;?>" />
<input type="hidden" name="order_fax" id="order_fax" class="text_box_order" value="<? echo $order_fax;?>" />
<input type="hidden" name="order_email" id="order_email" class="text_box_order" value="<? echo $order_email;?>" />
<input type="hidden" name="order_info" id="order_info" class="text_box_order" value="<? echo $order_info;?>" />
<input type="hidden" name="order_method" id="order_method" class="text_box_order" value="<? echo $order_method;?>" />
<input type="hidden" name="task" id="task" class="text_box_order" value="payment" />
<table width="100%"  class="auction_user" border="0">
			<tr class="title">
			  <td ><?php echo JText::_('ORDERING');?></td>
				<td  ><?php echo JText::_('PRODUCT_NAME');?></td>
				<td  ><?php echo JText::_('QUANTITY');?></td>
                <td  ><?php echo JText::_('UNIT_PRICE');?></td>
				<td  ><?php echo JText::_('SUB_TOTAL');?></td>
				
			</tr>
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
				<tr>
                	<td align="center"><?php echo $i; ?></td>
					<td ><?php echo $session->get('tenhang'.$i); ?></td>
					<td align="center" ><?php echo $session->get('soluong'.$i); ?></td>
                     <td align="center"><?php echo number_format($price,$decimal,'.',',')." ".$curency ; ?></td>
					<td align="right"><?php echo number_format(($price * $session->get('soluong'.$i)),$decimal,'.',',')." ".$curency ; ?></td>
					
				</tr>
		<?php
		$tong_tien += $price * $session->get('soluong'.$i);
		}
	}
	?>
	<tr>
    	<td colspan="4"  align="right"><strong><?php echo JText::_('GRAND_TOTAL');?></strong>:</td>
		<td  align="right"><?php echo number_format($tong_tien,$decimal,'.',',')." ".$curency; ?></td>
	
	</tr>

</table>

<div class="cb h_5"></div>

<div style="float:right">

<input name="dathang" type="submit" value="<?php echo JText::_('CHECKOUT'); ?>" />&nbsp;

</div>
<div style="float:left">
<a href="<?php echo JRoute::_("index.php?option=com_ecommerce&task=order");?>"><?php echo JText::_('EDIT_INFO'); ?></a>
</div>
</form>

<div class="cb h_10"></div>
<?php
	if($curency=="USD"){
		echo JText::_('PAYMENT_ACEPT_USD');
	}
	else {
		echo JText::_('PAYMENT_ACEPT_VND');
	}
?>


 <br /><br />
 <?php	if($curency=="USD"):?>
<div style="text-align:center">        
       
</div>
 <?php	else:?>
 	<div style="text-align:center">  
    	 <table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td><img src="images/card/master.jpg" /></td>
            <td><img src="images/card/vbc.jpg" /></td>
            <td><img src="images/card/donga.jpg" /></td>
            <td><img src="images/card/acb.jpg" /></td>
          </tr>
          <tr>
            <td><img src="images/card/techcom.jpg" /></td>
            <td><img src="images/card/vib.jpg" /></td>
            <td><img src="images/card/tienphong.jpg" /></td>
            <td><img src="images/card/dongnama.jpg" /></td>
          </tr>
		  <tr>
            <td colspan="4"><img src="images/card/nganluong.gif" /></td>
          </tr>
        </table>
        và một số thẻ ATM khác . . .
    </div>
 <?php	endif;?>

</div>
<div class="col2_box_footer"></div>
</div>
