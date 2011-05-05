<?php defined('_JEXEC') or die('Restricted access'); ?>
<link rel="stylesheet" href="components/com_ecommerce/styles.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/components/com_ecommerce/css/smoothbox.css" type="text/css" />
<script language="javascript" src="<?php echo $this->baseurl;?>/components/com_ecommerce/js/smoothbox.js" type="text/javascript"></script>

<div class="box-while-tbg title-text">
    <h1>Quản lí thông tin Hóa đơn của <?php echo $this->username; ?></h1>
</div>
<div class="line_c6c6c6"></div>
<div style="clear:both"></div><br />


<br />
<div style="color: #c72020; font-weight: bold">
► THÔNG MUA HÀNG CỦA '<?PHP echo $this->username ?>'
</div>
<BR />
<form action="index.php?option=com_imgsaler&view=adding" method="post" name="adminForm" onsubmit="checkdate();">
<select name="month" id="month">
	<option value="0">-- Chọn tháng --</option>
	<?php for($i=1; $i<=12 ; $i ++){ ?>
		<?php if(JRequest::getVar('month') == $i) { ?>
			<option value = "<?php echo $i ?>" selected="selected"><?php echo "Tháng ".$i; ?></option>
		<?php } else { ?>
			<option value = "<?php echo $i ?>"><?php echo "Tháng ".$i; ?></option>
		<?php } ?>
	<?php } ?>

</select>
<select name="year" id="year">
	<option value="0">-- Chọn năm --</option>
	<?php for($i=2009; $i<=2020 ; $i ++){ ?>
		<?php if(JRequest::getVar('year') == $i ) { ?>
			<option value = "<?php echo $i ?>" selected="selected"><?php echo "Năm ".$i; ?></option>
		<?php } else { ?>
			<option value = "<?php echo $i ?>"><?php echo "Năm ".$i; ?></option>
		<?php } ?>
	<?php } ?>
</select>
<input type="submit" value="Lọc">
<br />
<br />

<table width="100%" border="1"  id="detailcart" cellpadding="3">
<tr>
	<td class="header" align="center">Ngày mua hàng</td>
	<td class="header" align="center">MÃ Đơn đặt hàng</td>
</tr>
<?php 

foreach($this->lists as $l){
	echo "<tr>";
	echo "<td>".substr($l->date_buy,-19,10)."</td>";
	echo "<td><span class='number'><a href='index.php?option=com_ecommerce&view=orders&detail=1&order_id=".$l->code."'>[".$l->code."]</a></span></td>";
	echo "</tr>";
}
?>

</table>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="view" value="cart" />
</form>

<table border="0" width="100%">
<tr><td align="center">
<?php
	//bat dau danh so trang
	for ($i=1;$i<=$this->sotrang;$i++){
		if($i==$this->tht) {
			echo "<span class='number'>".$i."</span>&nbsp";
		} else { ?>
			<span class='number'><a href="index.php?option=com_imgsaler&view=adding&t=<?php echo $i; ?>" ><?php echo $i ?></a></span>
		<?php
		}
	}
?>
</td></tr>
</table>


<script language="javascript">
function checkdate(){
	if ($('month').value != 0 && $('year').value ==0){
		alert('Bạn vui lòng chọn năm để lọc!');
		return false;
	} else if ($('month').value == 0 && $('year').value !=0){
		alert('Bạn vui lòng chọn tháng để lọc!');
	}
}
</script>