<?
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<form action="index.php" method="post" name="adminForm" >
Product name
<input type="text" name="title" id="title" value="<?php echo $this->search['title'];?>" class="text_area"  title="<?php echo JText::_( 'Filter by Title' );?>"/>

&nbsp;&nbsp;
Category
<select name="category" id="category">
<option  value="" >- - - All category - - -</option>
<?php
	foreach ($this->catgories as $row){
		if($this->search['category']==$row->id)	echo "<option selected='selected' value='".$row->id."' >".$row->name_display."</option>";
		else echo "<option  value='".$row->id."' >".$row->name_display."</option>";
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
				Product name
			</th>
			<th width="10%">
				Category
			</th>
			<th width="10%">
				Price
			</th>
            <th width="10%">
				Promotion Price
			</th>
			
			<th width="25%">
				Product image
			</th>
			
			<th width="10%">Order<?php echo JHTML::_('grid.order',  $this->products); ?></th>
			
			<th width="5%" nowrap="nowrap">Published</th>
			
	
		</tr>			
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->products); $i < $n; $i++)
	{		$row = &$this->products[$i];
		$checked 	 = JHTML::_('grid.id',   $i, $row->id );
		$link 		 = JRoute::_( 'index.php?option=com_ecommerce&controller=products&task=edit&cid[]='. $row->id );
		$link2		 = JRoute::_( 'index.php?option=com_ecommerce&controller=portfolios&filter='.$row->id );
		$dir = $row->id+999-(($row->id-1)%1000);
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
				<?php echo $row->catname; ?>
			</td>	
			<td align="center">
				<strong><div style="color:#CC3300"><?php echo $row->price; ?>,- DKK</div></strong>
			</td>
            <td align="center">
				<strong><div style="color:#CC3300"><?php echo $row->promotion_price; ?>,- DKK</div></strong>
			</td>
			
			<td align="center">
				<img src="<?php if($row->image) echo '../components/com_ecommerce/imgupload/'.$row->image; ?>" border="0" width="55" >
			</td>
		
			<td align="center">
				<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" class="text_area" style="text-align: center" />
			</td>
		
		
		
		<?php if($row->published){ ?>
		<td width="5%" align="center" ><a href="#unpublishcat" onclick="return listItemTask('cb<?php echo $i;?>','unpublishcat')"><img border="0" alt="Published Cat" src="images/tick.png"/></a></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><a href="#publishcat" onclick="return listItemTask('cb<?php echo $i;?>','publishcat')"><img border="0" alt="Unpublished Cat" src="images/publish_x.png"/></a></td>
		<?php } ?>
			
			
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
