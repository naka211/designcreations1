<?
defined( '_JEXEC' ) or die( 'Restricted access' );
$cat_arr = array(1=>'Logo design', 2=>'Visitkort design', 3=>'Brapapir design', 4=>'A4 Brochure design');
?>

<form action="index.php" method="post" name="adminForm" >
Image name
<input type="text" name="title" id="title" value="<?php echo $this->search['title'];?>" class="text_area"  title="<?php echo JText::_( 'Filter by Title' );?>"/>

&nbsp;&nbsp;
Category
<select name="category" id="category">
<option  value="0" >All category</option>
<option value="1" <?php if($this->search['category'] == 1) echo 'selected="selected"';?>>Logo design</option>
<option value="2" <?php if($this->search['category'] == 2) echo 'selected="selected"';?>>Visitkort design</option>
<option value="3" <?php if($this->search['category'] == 3) echo 'selected="selected"';?>>Brapapir design</option>
<option value="4" <?php if($this->search['category'] == 4) echo 'selected="selected"';?>>A4 Brochure design</option>
</select>

&nbsp;&nbsp;
<button onclick="this.form.submit();"><?php echo JText::_( 'Search' ); ?></button>
<div id="editcell">
	<table class="adminlist">
	<thead>
		<tr>
			<th width="2%">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->images ); ?>);" />
			</th>
			<th width="2%" align="center">
				<?php echo JText::_( '#' ); ?>
			</th>
			<th width="10%">
				Image name
			</th>	
            <th width="10%">
				Image category
			</th>		
			<th width="25%">
				Image
			</th>
			
			<th width="10%">Order<?php echo JHTML::_('grid.order',  $this->images); ?></th>
			
			<th width="5%" nowrap="nowrap">Published</th>
			
	
		</tr>			
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->images); $i < $n; $i++)
	{		$row = &$this->images[$i];
		$checked 	 = JHTML::_('grid.id',   $i, $row->id );
		$link 		 = JRoute::_( 'index.php?option=com_images&controller=images&task=edit&cid[]='. $row->id );
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
				<?php echo $cat_arr[$row->catid]; ?>
			</td>			
			<td align="center">
				<img src="<?php if($row->thumb) echo '../images/imgupload/'.$row->thumb; ?>" border="0" width="170" >
			</td>
		
			<td align="center">
				<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
				<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" class="text_area" style="text-align: center" />
			</td>
		
		
		
		<?php if($row->publish){ ?>
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

<input type="hidden" name="option" value="com_images" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="images" />
<input type="hidden" name="publish" value="1" />
</form>
