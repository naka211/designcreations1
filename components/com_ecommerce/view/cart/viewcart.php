<div class="col2_box">
<div class="col2_box_header"><span> </span><?php echo JText::_('SHOPPING_CART');?> </div>
<div class="col2_box_content">
<div class="cb h_10"></div>
<form method="post" action="index.php?option=com_ecommerce&task=updatecart">
		<table width="100%"  class="auction_user" border="0">
			<tr class="title">
	            <td width="10px" ><?php echo JText::_('DELETE');?></td>
				<td ><?php echo JText::_('ORDERING');?></td>
				<td  ><?php echo JText::_('PRODUCT_NAME');?></td>
				<td  ><?php echo JText::_('QUANTITY');?></td>
                <td  ><?php echo JText::_('UNIT_PRICE');?></td>
				<td  ><?php echo JText::_('SUB_TOTAL');?></td>
				
			</tr>
	<?php
	$curLanguage = JFactory::getLanguage();
	$session =& JFactory::getSession();
	$curency = $session->get("curency",($curLanguage->getTag()=="vi-VN" ? "VND":"USD")); 
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
                	<td align="center"> 
					<a title="Xóa mặt hàng này ra khỏi giỏ hàng" href="index.php?option=com_ecommerce&task=delcart&i=<?php echo $i; ?>"><img src="<?php echo JURI::base().'components/com_ecommerce/imgs/delete.gif'; ?>"/></a>
					</td>
					<td align="center"><?php echo $i; ?></td>
					<td ><?php echo $session->get('tenhang'.$i); ?></td>
					<td align="center" ><input type="text" maxlength="3" style="text-align:center" size="5" name="C<?php echo $i ?>" value="<?php echo $session->get('soluong'.$i); ?>" >
					 </td>
                     <td align="center"><?php echo number_format($price,$decimal,'.',',')." ".$curency ; ?></td>
					<td align="right"><?php echo number_format(($price * $session->get('soluong'.$i)),$decimal,'.',',')." ".$curency ; ?></td>
					
				</tr>
		<?php
		$tong_tien += $price * $session->get('soluong'.$i);
		}
	}
	?>
	<tr>
    	<td colspan="5"  align="right"><strong><?php echo JText::_('GRAND_TOTAL');?></strong>:</td>
		<td  align="right"><?php echo number_format($tong_tien,$decimal,'.',',')." ".$curency; ?></td>
	
	</tr>

</table>
<div class="cb h_5"></div>
<?php echo JText::sprintf('DELIVERY_COSTS',"chuabiet");?>
<div class="cb h_5"></div>
<div style="float:right">
<input name="dathang" type="button" value="<?php echo JText::_('CONTINUTE_SHOPPING'); ?>" onclick="location.href='index.php?option=com_ecommerce&view=list'" >&nbsp;
<input name="capnhat" type="submit" value="<?php echo JText::_('UPDATE'); ?>">&nbsp;

<input name="dathang" type="button" value="<?php echo JText::_('CHECKOUT'); ?>" onclick="location.href='index.php?option=com_ecommerce&task=order'" >&nbsp;

</div>

<div class="cb h_5"></div>
</form>
<div class="cb h_10"></div>
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