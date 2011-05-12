 <?
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<link rel="stylesheet" href="../components/com_ecommerce/css/smoothbox.css" type="text/css" />
<script language="javascript" src="../components/com_ecommerce/js/smoothbox.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">
function show_orderdetail(order,order_id){ 
	TB_show("Thông tin chi tiết đơn hàng số " , "../index.php?option=com_ecommerce&view=orders&height=350&width=550&order_id=8", "", "../images/loading.gif");
}
</script>
<form action="index.php" method="post" name="adminForm">

<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="5%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->orders ); ?>);" />
			</th>
			<th width="10%">
				Order code
			</th>
			<th width="15%">
				Name
			</th>
			<th width="15%">
				Address
			</th>
			<th width="15%">
				Phone
			</th>
			<th width="15%">
				Email
			</th>
			<th width="15%">
				Subtotal
			</th>
			
		</tr>			
	</thead>
	
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->orders ); $i < $n; $i++)
	{		$row = &$this->orders[$i];
		$checked 	 = JHTML::_('grid.id',   $i, $row->order_id );
		
		$status = array('', 'chothanhtoan', 'dathanhtoan', 'dagiaohang', 'khongchapnhan');
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center">
				<?php echo $checked; ?>
			</td>
			<td align="center">
				<a href="index.php?option=com_ecommerce&controller=orders&task=edit&cid[]=<?php echo $row->order_id?>">
				<?php echo sprintf("%05d", $row->order_id); ?>
				</a>
			</td>
			<td align="center">
				<?php echo $row->order_name; ?>
			</td>
			<td align="center">
				<?php echo $row->order_address; ?>
			</td>			
			<td align="center">
				<?php echo $row->order_phone; ?> 
			</td>			
			<td align="center">
				<?php echo $row->order_email; ?> 
			</td>
			<td align="center">
				<?php echo $row->order_total; ?>  DKK
			</td>
			
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
			<!--<tr>
				<td colspan="10">
					<?php echo $this->page->getListFooter(); ?><br />
					<img src="../images/chothanhtoan.png" width="20" height="20" align="absmiddle" />: Pending &nbsp;
					<img src="../images/dathanhtoan.png" width="20" height="20" align="absmiddle" />: Confirmed &nbsp;
					<img src="../images/khongchapnhan.png" width="20" height="20" align="absmiddle" />: Cancelled
				</td>
			</tr>-->
	</table>
</div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="orders" />
</form>