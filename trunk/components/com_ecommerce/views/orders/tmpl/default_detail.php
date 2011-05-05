<?php defined('_JEXEC') or die('Restricted access'); ?>
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
	echo "<td>".$i."</td>";
	echo "<td>".$p->product_id."</td>";
	echo "<td>".$p->quantity."</td>";
	echo "<td>".$p->price."</td>";
	echo "<td>".$p->total."</td>";
	echo "</tr>";
	$i++;
}
?>

</table>
