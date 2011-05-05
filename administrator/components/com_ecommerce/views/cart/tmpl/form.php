<?
defined( '_JEXEC' ) or die( 'Restricted access' );

?>


<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="editcell">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Chi tiết đơn hàng' ); ?></legend>

		<table class="adminlist" cellpadding="5">
			<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="20%">Mã đơn hàng</th>
				<th width="25%">Sản phẩm</th>
				<th width="15%">Số luợng mua</th>
				<th width="15%">Giá</th>
				<th width="15%">Point</th>
			</tr>
			</thead>
			
			<?php
			$i =1; $totalprice=0; $totalpoint=0;
			foreach ($this->carts as $cs){
			?>
				<tr>
					<td align="center"><?php echo $i; ?></td>
					<td align="center"><?php echo $cs->code; ?></td>
					<td align="center"><?php echo $cs->product_name; ?></td>
					<td align="right"><?php echo $cs->quantity; ?></td>
					<td align="right"><?php echo number_format($cs->price,-3,",","."); ?> VNĐ</td>
					<td align="right"><?php echo $cs->point; ?></td>
				</tr>
			<?php
			$totalprice += $cs->price;
			$totalpoint += $cs->point;
			$i++;
			}
			?>
			<tr>
				<td colspan="5" align="right">Tổng tiền mua hàng : <?php echo number_format($totalprice,-3,",","."); ?> VNĐ</td>
				<td align="right">Tổng điểmtrong ĐĐH : <?php echo $totalpoint;?></td>
			</tr>

		</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="id" value="<?php echo $this->cart->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="carts" />
</form>