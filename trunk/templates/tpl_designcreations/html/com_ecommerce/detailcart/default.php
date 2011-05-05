<?php defined('_JEXEC') or die('Restricted access'); ?>
<link rel="stylesheet" href="components/com_ecommerce/styles.css" type="text/css" />
<div class="tab_left_1"></div>
<div class="tab_bg_cennter">Quản lí thông tin Hóa đơn của <?php echo $this->username; ?> </div>
<div class="cb"></div>
<div class="box_bd_bg">

<div style="color: #c72020; font-weight: bold">
► THÔNG MUA HÀNG TIỀN CỦA '<?PHP echo $this->username ?>'
</div>
<BR />

<table width="100%" border="0"  class="auction_user" cellpadding="0" id="detailcart">
<tr class="title">
	<td  align="center" width="20%">STT</td>
	<td  align="center" width="20%">Mã Đơn đặt hàng</td>
	<td  align="center" width="30%">Sản phẩm</td>
	<td  align="center" width="10%">Số luợng</td>
	<td  align="center" width="20%">Giá</td>
</tr>
<?php 
$tong = 0;
foreach($this->lists as $l){
	echo "<tr>";
	echo "<td align='center'>".$l->date_buy."</td>";
	echo "<td align='center'>".$l->code."</td>";
	echo "<td>".$l->pr_name."</td>";
	echo "<td align='right'>".$l->quantity."</td>";
	echo "<td align='right'><span class='number'>".number_format($l->price,-3,",",".")." </span> VNĐ</td>";
	echo "</tr>";
	$tong += $l->price;
}
?>
<tr>
	<td colspan="5" align="right"><span class="number"><?php echo number_format($tong,-3,",","."); ?></span> VNĐ</td>
</tr>

</table>
</div>
<div class="box_bd_bottom"></div>
<div class="cb h_10"></div>

