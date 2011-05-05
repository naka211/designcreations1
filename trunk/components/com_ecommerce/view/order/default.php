<div class="col2_box">
<div class="col2_box_header"><span> </span><?php echo JText::_('SHIPPING_ADDRESS');?></div>
<div class="col2_box_content">
<form method="post" action="index.php?option=com_ecommerce&task=order">
	<input type="hidden" name="option" value="com_ecommerce" />
   	<input type="hidden" name="task" value="order" />
	<table width="100%" border="0" cellpadding="5" cellspacing="2" >
		  <tr class="tab_left_order">
			<td width="28%" align="right"><?php echo JText::_('YOUR_NAME');?>:</td>
			<td width="72%" ><input type="text" name="order_contact_name"  id="order_contact_name" class="text_box_order" value="<? echo $order_contact_name;?>" /></td>
		  </tr>
		  <tr>
			<td align="right" ><?php echo JText::_('YOUR_ADDRESS');?>:</td>
			<td><input type="text" name="order_address" id="order_address" class="text_box_order" value="<? echo $order_address;?>" /></td>
		  </tr>
		  <tr class="tab_left_order">
			<td align="right"><?php echo JText::_('PHONE');?>:</td>
			<td><input type="text" name="order_phone" id="order_phone" class="text_box_order" value="<? echo $order_phone;?>" /></td>
		  </tr>
		  <tr>
			<td align="right"><?php echo JText::_('FAX');?>:</td>
			<td><input type="text" name="order_fax" id="order_fax" class="text_box_order" value="<? echo $order_fax;?> " /></td>
		  </tr>
		  <tr class="tab_left_order">
			<td align="right">Email:</td>
			<td><input type="text" name="order_email" id="order_email" class="text_box_order" value="<? echo $order_email;?>" /></td>
		  </tr>
		
		   <tr class="tab_left_order">
			<td align="right"><?php echo JText::_('PAYMENT_METHOD');?>:</td>
			<td>
				<label><input type="radio" name="order_method" id="order_method1" value="1" /> <?php echo JText::_('PAYMENT_ONLINE');?></label><br />
				<label><input type="radio" name="order_method" id="order_method2" value="2" /> <?php echo JText::_('BANK_TRANSFER');?></label><br />
				<label><input type="radio" name="order_method" id="order_method3" value="3" /> <?php echo JText::_('CASH_ON_DELIVERY');?></label>
			 </td>
		  </tr>
		  <tr>
			<td colspan="2" align="center"><input type="reset" name="reset" id="reset" value="Nhập lại" />  <input type="submit" name="submit" id="submit" value="Chấp nhận" /></td>
		  </tr>
	</table>
</form>
<script language="javascript" type="text/javascript" >
 if('<? echo $order_method;?>'!='0') $('order_method<? echo $order_method;?>').checked=true;

</script>
<div class="cb h_10"></div>

</div>
<div class="col2_box_footer"></div>
</div>
