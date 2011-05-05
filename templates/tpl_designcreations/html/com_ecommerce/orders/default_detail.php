<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php $method = array('','Trực tuyến','Chuyển khoản','Tiền mặt khi nhận hàng');?>
<div class="pro_name_more"><strong>Thông tin liên hệ</strong>:</div>
<div class="line_dotted_100"></div>
<div class="pro_nd_more">
	<strong>Họ tên người nhận</strong>: <? echo $this->order->order_contact_name;?><br />
    <strong>Địa chỉ giao hàng</strong>: <? echo $this->order->order_address;?> <br />
    <strong>Số điện thoại</strong>: <? echo $this->order->order_phone;?> <br />
    <strong>Số fax</strong>: <? echo $this->order->order_fax;?> <br />
    <strong>Email</strong>: <? echo $this->order->order_email;?> <br />
	<strong>Thông tin xuất hóa đơn</strong>: <? echo $this->order->order_info;?> <br />
    <strong>Hình thức thanh toán</strong>: <? echo $method[$this->order->order_method];?>  
</div>
<div class="cb h_15"></div>
<div class="pro_name_more"><strong>Danh sách hàng hóa</strong>:</div>
<div class="line_dotted_100"></div>
<div class="cb h_10"></div>
<table width="100%" class="auction_user" cellpadding="3">
<tr class="title">
	<td align="center">STT</td>
	<td align="center">Tên sản phẩm</td>
    <td align="center">Số lượng</td>
    <td align="center">Đơn giá</td>    
    <td align="center">Thành tiền</td>
</tr>
<?php 
$i=1;

foreach($this->order->products as $p){
	echo "<tr>";
	echo "<td align=\"center\">".$i."</td>";
	echo "<td>".$p->product_name."</td>";
	echo "<td align=\"center\">".$p->quantity."</td>";
	echo "<td align=\"center\">".$p->price."</td>";
	echo "<td align=\"right\">".$p->total."</td>";
	echo "</tr>";
	$i++;
}
?>
<tr >

    <td align="right" colspan="4"><strong>Tổng cộng</strong>: </td>    
    <td align="right"><?php echo $this->order->order_total;?></td>
</tr>
</table>

