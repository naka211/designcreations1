<?php
$db = &JFactory::getDBO();
$session =& JFactory::getSession();
if($session->get('tongsl') != 0)
{
?>
<table width="100%" border="0">
<?php
	 $this->config = $ecom_config;
	$curLanguage = JFactory::getLanguage();
	$curency = $session->get("curency",($curLanguage->getTag()=="vi-VN" ? "VND":"USD"));
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
			<td><?php echo $session->get('soluong'.$i); ?> x <a href="index.php?option=com_ecommerce&view=detail&id=<?php echo $session->get('mahang'.$i); ?>"><?php echo $session->get('tenhang'.$i); ?></a></td>
			<td width="10"><a title="Xóa m?t hàng này ra kh?i gi? hàng" href="index.php?option=com_ecommerce&task=delcart&i=<?php echo $i; ?>"><img src="<?php echo JURI::base().'components/com_ecommerce/imgs/delete.gif'; ?>"/></a></td>
		</tr>
		<tr>
			<td style="color:#FF0000;"><?php echo number_format(($price * $session->get('soluong'.$i)),$decimal,'.',',')." ".$curency ; ?></td>
		</tr>
<?php
		$tong_tien += $price * $session->get('soluong'.$i);
		}
	}
	?>

</table>
<div class="cb h_2"></div>
<div class="line_dotted_100"></div>
<div class="cb h_2"></div>
<div><?php echo JText::_('TOTAL'); ?> : <span  style="color:#FF0000; font-weight: bold"><?php echo number_format($tong_tien,$decimal,'.',',') ?></span> <?php echo $curency;?> </div>
<div class="cb h_5"></div>
<div class="fl" style="padding-top:5px">
[<a href="index.php?option=com_ecommerce&task=addcart"><?php echo JText::_('READMORE'); ?></a>]</div>
<div style="float:right">
<input name="dathang"  type="button" value="<?php echo JText::_('CHECKOUT'); ?>" onclick="location.href='index.php?option=com_ecommerce&task=order'" ></div>
<?php
}
else
{
	echo JText::_('CART_EMPTY');
}
?>