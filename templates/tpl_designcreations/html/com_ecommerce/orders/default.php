<?php defined('_JEXEC') or die('Restricted access'); ?>
<link rel="stylesheet" href="components/com_ecommerce/styles.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/components/com_ecommerce/css/smoothbox.css" type="text/css" />
<script language="javascript" src="<?php echo $this->baseurl;?>/components/com_ecommerce/js/smoothbox.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
function show_orderdetail(order,order_id){
	  TB_show("Thông tin chi tiết đơn hàng số " + order, '<?php echo $this->baseurl;?>/index.php?option=com_ecommerce&view=orders&tmpl=component&height=350&width=550&order_id='+order_id, '', '<?php echo $this->baseurl;?>/images/loading.gif');
}
</script>

<div class="tab_left_1"></div>
<div class="tab_bg_cennter">Danh sách đơn hàng của <?php echo $this->username; ?> </div>
<div class="cb"></div>
<div class="box_bd_bg">
  <div class="cb h_10"></div>
  <form action="index.php" method="get" name="adminForm" onsubmit="checkdate();">
  	<input type="hidden" name="option" value="com_ecommerce" />
    <input type="hidden" name="view" value="orders" />
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
    <table width="100%"  class="auction_user">
      <tr class="title">
        <td  align="center">STT</td>
        <td  align="center">Mã Đơn hàng</td>
        <td  align="center">Ngày</td>
        <td  align="center">Hình thức thanh toán</td>
        <td  align="center">Tổng số tiền</td>
        <td  align="center">Trạng thái</td>
      </tr>
      <?php 
if(count($this->lists)<1)
{
	echo "<tr>";
		echo "<td align='center' colspan=6> Chưa có đơn hàng nào được lập</td>";
		echo "</tr>";
}
else
{
	$i=1;
	$method = array('','Trực tuyến','Chuyển khoản','Tiền mặt khi nhận hàng');
	$status = array('', 'chothanhtoan', 'dathanhtoan', 'dagiaohang', 'khongchapnhan');
	foreach($this->lists as $l){
		echo "<tr>";
		echo "<td align='center'>$i</td>";
		echo "<td align='center'><a href='index.php?option=com_ecommerce&view=orders&order_id=$l->order_id' onclick=\"show_orderdetail('".sprintf("%05d", $l->order_id)."',$l->order_id); return false;\">".sprintf("%05d", $l->order_id)."</a></td>";
		echo "<td align='center'>$l->order_date</td>";
		echo "<td align='center'>".$method[$l->order_method]."</td>";
		echo "<td align='right'>".number_format($l->order_total,-3,",",".")."</td>";
		echo "<td align='center'><img src='images/".$status[$l->order_status].".png' width='20' height='20' /></td>";
		echo "</tr>";
		$i++;
	}
}
?>
    </table>
  </form>
  <table border="0" width="100%">
    <tr>
      <td align="center"><?php
	//bat dau danh so trang
	for ($i=1;$i<=$this->sotrang;$i++){
		if($i==$this->tht) {
			echo "<span class='number'>".$i."</span>&nbsp";
		} else { ?>
        <span class='number'><a href="index.php?option=com_ecommerce&view=orders&t=<?php echo $i; ?>" ><?php echo $i ?></a></span>
        <?php
		}
	}
?>
      </td>
    </tr>
  </table>
  <table width="100%">
	  <tr>
	  	<td align="left">
			<img src="images/chothanhtoan.png" width="20" height="20" align="absmiddle" />: Chờ thanh toán &nbsp;
			<img src="images/dathanhtoan.png" width="20" height="20" align="absmiddle" />: Đã thanh toán &nbsp;
			<img src="images/dagiaohang.png" width="20" height="20" align="absmiddle" />: Đã giao hàng &nbsp;
			<img src="images/khongchapnhan.png" width="20" height="20" align="absmiddle" />: Không chấp nhận
		</td>
	  </tr>
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
</div>
<div class="box_bd_bottom"></div>
<div class="cb h_10"></div>