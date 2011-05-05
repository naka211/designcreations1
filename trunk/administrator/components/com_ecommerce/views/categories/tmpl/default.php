<?
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<form action="index.php" method="post" name="adminForm">
	

	<div id="editcell">
		<table class="adminlist">
		<thead>
			<tr>

				
				<th width="1%">
					<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->categories ); ?>);" />
				</th>
				
				<th width="30%">
					Category name
				</th>
                <th width="5%">
					<?php echo JText::_( 'ID' ); ?>
				</th>
				
				<th width="15%">
					Description
				</th>
				<th width="15%">
					Product
				</th>
				<th width="5%">Order<?php echo JHTML::_('grid.order',  $this->categories); ?></th>
				<th width="5%" nowrap="nowrap">Published</th>
				
				
			</tr>			
		</thead>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->categories); $i < $n; $i++)
		{		$row = &$this->categories[$i];
			$checked 	 = JHTML::_('grid.id',   $i, $row->id );
			$link 		 = JRoute::_( 'index.php?option=com_ecommerce&controller=categories&task=edit&cid[]='. $row->id );
			$link2		 = JRoute::_( 'index.php?option=com_ecommerce&controller=portfolios&filter='.$row->id );

			?>
			<tr class="<?php echo "row$k"; ?>">
				<td>
					<?php echo $checked; ?>
				</td>
				
				<td align="left">
					<a href="<?php echo $link; ?>"><?php echo $row->name_display; ?> </a>
				</td>
                <td align="center">
					<?php echo $row->id; ?> 
				</td>
				
				<td align="center">
					<?php echo $row->description; ?> 
				</td>
				<td align="center">
					<a href="index.php?option=com_ecommerce&controller=products&category=<?php echo $row->id; ?>" >Product list</a>
				</td>
				<td>
						
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
		
		</table>
	</div>

	<input type="hidden" name="option" value="com_ecommerce" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="controller" value="categories" />
	</form>
