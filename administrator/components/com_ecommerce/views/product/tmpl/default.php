<?
defined( '_JEXEC' ) or die( 'Restricted access' );

?>

<form action="index.php" method="post" name="adminForm">
Tên sản phẩm
<input type="text" name="search" id="search" value="<?php echo $this->lists['search'];?>" class="text_area"  title="<?php echo JText::_( 'Filter by Title' );?>"/>

&nbsp;&nbsp;
Phân lọai sản phẩm
<select name="category" id="category">
<option  value="" >- - - Tất cả các phân mục - - -</option>
<?php
	foreach ($this->catgories as $row){
		if($this->category==$row->id)	echo "<option selected='selected' value='".$row->id."' >".$row->name_display."</option>";
		else echo "<option  value='".$row->id."' >".$row->name_display."</option>";
	}
?>
</select>


&nbsp;&nbsp;
Hãng sản xuất
<select name="company" id="company">
	<option value='0'>--Select a company--</option>
	<?php
		$db =& JFactory::getDBO();
		$query = "select * from #__pr_company where published=1";
		$db->setQuery($query);
		if($rows = $db->loadObjectList()){
			foreach($rows as $row){
				if(JRequest::getVar('company')==$row->id){
					echo "<option selected='selected' value='".$row->id."'>".$row->name."</option>";
				} else {
					echo "<option value='".$row->id."'>".$row->name."</option>";
				}
			}
		}
	?>
</select>
&nbsp;&nbsp;
<button onclick="this.form.submit();"><?php echo JText::_( 'Search' ); ?></button>
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>

			
			<th width="2%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->products ); ?>);" />
			</th>
			<th width="2%" align="center">
				<?php echo JText::_( '#' ); ?>
			</th>
			<th width="10%">
				Tên
			</th>
			<th width="8%">
				Mã sản phẩm
			</th>
			<th width="5%">
				Bảo hành
			</th>
			<th width="9%">
				Giá
			</th>
			<th width="5%">
				Thuế (%)
			</th>
			<th width="10%">
				Hình sản phẩm
			</th>
			<th width="3%">
				Số luợng tồn
			</th>
			<th width="7%">Order<?php echo JHTML::_('grid.order',  $this->products); ?></th>
			<th width="4%" nowrap="nowrap">Sản phẩm mới</th>
			<th width="3%" nowrap="nowrap">Published</th>
			<th width="5%">
				Nhận xét
			</th>
	
		</tr>			
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->products); $i < $n; $i++)
	{		$row = &$this->products[$i];
		$checked 	 = JHTML::_('grid.id',   $i, $row->id );
		$link 		 = JRoute::_( 'index.php?option=com_ecommerce&controller=products&task=edit&cid[]='. $row->id );
		$link2		 = JRoute::_( 'index.php?option=com_ecommerce&controller=portfolios&filter='.$row->id );

		?>
		<tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo $checked; ?>
			</td>
			<td align="center">
				<?php echo $this->page->getRowOffset( $i ); ?>
			</td>
			<td align="center">
				<a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
			</td>
			
		
			<td align="center">
				<?php echo $row->code; ?>
			</td>
			<td align="center">
				<?php echo $row->warranty; ?>
			</td>
			<td align="center">
				<?php echo number_format($row->price,-3,",",".")." vnd"; ?>
			</td>
			<td align="center">
				<?php echo $row->tax." %"; ?>
			</td>
			<td align="center">
				<img src="<?php echo '../components/com_ecommerce/prsupload/' . $row->image; ?>" border="0" width="100px" height="80px">
			</td>
			<td align="center">
				<?php echo $row->quantity; ?>
			</td>

			<td align="center">
				<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" class="text_area" style="text-align: center" />
			</td>
		<?php if($row->isnew){ ?>
		<td width="5%" align="center" ><a href="#unNewProduct" onclick="return listItemTask('cb<?php echo $i;?>','unNewProduct')"><img border="0" alt="new" src="images/tick.png"/></a></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><a href="#NewProduct" onclick="return listItemTask('cb<?php echo $i;?>','NewProduct')"><img border="0" alt="Unnew" src="images/publish_x.png"/></a></td>
		<?php } ?>
		
		
		<?php if($row->published){ ?>
		<td width="5%" align="center" ><a href="#unpublishcat" onclick="return listItemTask('cb<?php echo $i;?>','unpublishcat')"><img border="0" alt="Published Cat" src="images/tick.png"/></a></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><a href="#publishcat" onclick="return listItemTask('cb<?php echo $i;?>','publishcat')"><img border="0" alt="Unpublished Cat" src="images/publish_x.png"/></a></td>
		<?php } ?>
			
			<td align="center">
				<a href="index.php?option=com_ecommerce&controller=topics&product_id=<?php echo $row->id; ?>">[Xem]</a>
			</td>
		</tr>
		<?php
		$k = 1 - $k;
	}
	?>
			<tr>
				<td colspan="16">
					<?php echo $this->page->getListFooter(); ?>
				</td>
			</tr>
	</table>
</div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="products" />
</form>
