<?
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<script language="javascript">
function getID(){
	var str='';
	if (document.adminForm.cid.length > 1){
		for (var i=0; i< document.adminForm.cid.length; i++){
			if(document.adminForm.cid[i].checked)
				str += document.adminForm.cid[i].value + ',';
		}
	} else {
		str += document.adminForm.cid.value + ',';
	}
		document.adminForm.codes.value = str;
		//alert('CÃ¡m Æ¡n báº¡n Ä‘Ã£ chá»�n sáº£n pháº©m. Báº¡n cÃ³ thá»ƒ nháº¥n nÃºt Táº¡o Báº£n In Ä‘á»ƒ in sáº£n pháº©m Ä‘Ã£ chá»�n, hoáº·c tiáº¿p tá»¥c chá»�n thÃªm Sáº£n pháº©m khÃ¡c.');
}
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm" onsubmit="getID()">
<fieldset>
Mã đơn đặt hàng
<input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area"  title="<?php echo JText::_( 'Filter by Title' );?>"/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Month: 
<select name="month">
	<?php if(JRequest::getVar('month') == 0) { ?>
		<option value = "0"  selected="selected">--Chọn tháng--</option>
	<?php } else { ?>
		<option value = "0">--Chọn tháng--</option>
	<?php } ?>


	<?php for($i=1; $i<=12 ; $i ++){ ?>
		<?php if(JRequest::getVar('month') == $i) { ?>
			<option value = "<?php echo $i ?>" selected="selected"><?php echo $i; ?></option>
		<?php } else { ?>
			<option value = "<?php echo $i ?>"><?php echo $i; ?></option>
		<?php } ?>
	<?php } ?>

</select>
Year: 
<select name="year">
	<?php for($i=2009; $i<=2020 ; $i ++){ ?>
		<?php if(JRequest::getVar('year') == $i ) { ?>
			<option value = "<?php echo $i ?>" selected="selected"><?php echo $i; ?></option>
		<?php } else { ?>
			<option value = "<?php echo $i ?>"><?php echo $i; ?></option>
		<?php } ?>
	<?php } ?>
</select>
&nbsp;&nbsp;
<button onclick="this.form.submit();"><?php echo JText::_( 'Search' ); ?></button>
</fieldset>

<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>

			<!--
			<th width="5%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php //echo count( $this->carts ); ?>);" />
			</th>
			-->
			<th width="5%">
				<?php echo JText::_( 'ID' ); ?>
			</th>
			<th width="60%">
				Mã Đơn đặt hàng
			</th>
			<th width="30%">
				Ngày mua hàng
			</th>
		</tr>			
	</thead>
	
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->carts ); $i < $n; $i++)
	{		$row = &$this->carts[$i];
		$checked 	 = JHTML::_('grid.id',   $i, $row->code );
		$link 		 = JRoute::_( 'index.php?option=com_ecommerce&controller=carts&task=edit&codes[]='. $row->code );

		?>
		<tr class="<?php echo "row$k"; ?>">
			<!--
			<td>
				<input type="checkbox" name="cid[]" id="cb<?php //echo $i; ?>" value="<?php //echo $row->code; ?>" />
			</td>
			-->
			<td>
				<?php echo $this->page->getRowOffset( $i ); ?>
			</td>
			<td align="center">
				<a href="<?php echo $link; ?>">
				<?php echo $row->code; ?>
				</a>
			</td>
			<td align="center">
				<?php echo substr($row->date_buy,-19,10); ?>
			</td>

		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
			<tr>
				<td colspan="7">
					<?php echo $this->page->getListFooter(); ?>
				</td>
			</tr>
	</table>
</div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="codes" id="codes" value="">
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="carts" />
</form>
