<?php defined('_JEXEC') or die('Restricted access'); ?>
<link rel="stylesheet" href="components/com_ecommerce/styles.css" type="text/css" />
<div class="box-while-tbg title-text">
    <h1>Quản lí thông tin Hóa đơn của <?php echo $this->username; ?></h1>
</div>
<div class="line_c6c6c6"></div>
<div style="clear:both"></div><br />


<br />
<div style="color: #c72020; font-weight: bold">
► THÔNG MUA HÀNG TIỀN CỦA '<?PHP echo $this->username ?>'
</div>
<BR />

<table width="100%" border="0"  class="download_form" cellpadding="0" id="detailcart">
<tr>
	<td class="header" align="center" width="20%">Ngày mua hàng</td>
	<td class="header" align="center" width="20%">Mã Đơn đặt hàng</td>
	<td class="header" align="center" width="30%">Sản phẩm</td>
	<td class="header" align="center" width="10%">Số luợng</td>
	<td class="header" align="center" width="20%">Giá</td>
</tr>
<?php 
$tong = 0;
foreach($this->lists as $l){
	echo "<tr>";
	echo "<td align='center'>".$l->date_buy."</td>";
	echo "<td align='center'>".$l->code."</td>";
	echo "<td>".$l->pr_name."</td>";
	echo "<td align='right'>".$l->quantity."</td>";
	echo "<td align='right'><span class='number'>".number_format($l->price,-3,",",".")." </span>VNĐ</td>";
	echo "</tr>";
	$tong += $l->price;
}
?>
<tr>
	<td colspan="5" align="right"><span class="number"><?php echo number_format($tong,-3,",","."); ?></span> VNĐ</td>
</tr>

</table>
