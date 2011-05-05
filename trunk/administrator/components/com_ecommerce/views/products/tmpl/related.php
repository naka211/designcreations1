<?
defined( '_JEXEC' ) or die( 'Restricted access' );

$input_related= JRequest::getVar('input_related',array());

?>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<fieldset id="related_list">
	<legend>Sản phẩm đã chọn</legend>
    <div style="float:right"><button onclick="addRelatedProducts();window.top.setTimeout('window.parent.document.getElementById(\'sbox-window\').close()', 700);">Đồng ý</button>&nbsp;&nbsp;<button onclick="window.parent.document.getElementById('sbox-window').close();">Bỏ qua</button></div>
     <?php
	 	$array_id =array();
		foreach($input_related as $item){
			$array_id[] = $related_id = intval($item);
			$related_title = split(":",$item,2);
			echo "<div class='related_products' title='".$related_title[1]."' id='related_$related_id'> ".$related_title[1]."  <a href='#' onclick='remove_related_product($related_id); return false;'>[Xóa]</a></div>";
			echo '<input type="hidden" id="input_related_'.$related_id.'" name="input_related[]" value="'. htmlspecialchars($item).'" />';
		}
	?>
	
</fieldset>
 <?php
	 	/*reset($input_related);
		foreach($input_related as $item){
			$related_id = intval($item);
			echo '<input type="hidden" id="input_related_'.$related_id.'" name="input_related[]" value="'. htmlspecialchars($item).'" />';
		}*/
	?>
Tên sản phẩm
<input type="text" name="title" id="title" value="<?php echo JRequest::getVar('title','');?>" class="text_area"  title="<?php echo JText::_( 'Filter by Title' );?>"/>

&nbsp;&nbsp;
Phân lọai
<select name="category" id="category" style="width:180px">
<option  value="" >- - - Tất cả các phân mục - - -</option>
<?php
	$category = JRequest::getVar('category','');
	foreach ($this->catgories as $row){
		if($category==$row->id)	echo "<option selected='selected' value='".$row->id."' >".$row->name_display."</option>";
		else echo "<option  value='".$row->id."' >".$row->name_display."</option>";
	}
?>
</select>


&nbsp;&nbsp;
Hãng
<select name="company" id="company">
	<option value=''>-- Tất cả các hãng--</option>
	<?php
		$company = JRequest::getVar('company','');
		$db =& JFactory::getDBO();
		$query = "select * from #__pr_company where published=1";
		$db->setQuery($query);
		if($rows = $db->loadObjectList()){
			foreach($rows as $row){
				if($company==$row->id){
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
						</th>
			<th width="2%" align="center">
				<?php echo JText::_( '#' ); ?>			</th>
			<th width="10%">
				Tên			</th>
			<th width="8%">
				Hãng sản xuất			</th>
		
			<th width="9%">
				Giá	(USD)		</th>

			<th width="3%" nowrap="nowrap">Published</th>
		
		</tr>			
	</thead>
	<?php
	$k = 0;
	for ($i=0, $n=count( $this->products); $i < $n; $i++)
	{		$row = &$this->products[$i];
		//$checked 	 = JHTML::_('grid.id',   $i, $row->id );
		$link 		 = JRoute::_( 'index.php?option=com_ecommerce&controller=products&task=edit&cid[]='. $row->id );
		$link2		 = JRoute::_( 'index.php?option=com_ecommerce&controller=portfolios&filter='.$row->id );
		$checked ="";
		if( in_array($row->id, $array_id) ) $checked ='checked="checked"';
		?>
		<tr class="<?php echo "row$k"; ?>">
			<td align="center"> <input type="checkbox"  <?php echo $checked;?>  id="check_<?php echo $row->id?>" name="id" onclick="add_move_product(this,<?php echo $row->id. ",'". htmlspecialchars($row->name) ."'" ;?>)" />
						</td>
			<td align="center">	<?php echo $this->page->getRowOffset( $i ); ?></td>
			<td align="center">	<strong><?php echo $row->name; ?></strong></td>
			
		
			<td align="center">
				<?php echo $row->company_name; ?>			</td>
		
			<td align="center">
				<?php echo number_format($row->price,-3,",","."); ?>			</td>
		
		<?php if($row->published){ ?>
		<td width="5%" align="center" ><img border="0" alt="Published Cat" src="images/tick.png"/></td>
		<?php }else{ ?>
		<td width="5%" align="center" ><img border="0" alt="Unpublished Cat" src="images/publish_x.png"/></td>
		<?php } ?>
			
		
		<?php
		$k = 1 - $k;
	}
	?>
			<tr>
				<td colspan="16">
					<?php echo $this->page->getListFooter(); ?>				</td>
			</tr>
	</table>
</div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="layout" value="related" />
<input type="hidden" name="tmpl" value="component" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="products" />
</form> 

<script language="javascript" type="text/javascript">
function add_move_product(element,id,pro_name){
	if(element.checked) add_related_product(id,pro_name);
	else remove_related_product(id);
}
function add_related_product(id,pro_name){
	new Element('input', {'type':'hidden','id':'input_related_'+id,'name':'input_related[]','value':id+":"+pro_name}).inject($('related_list'));
	element = new Element('div', {'id':'related_'+id,'value':pro_name,'class':'related_products','title':pro_name}).inject($('related_list'));
	element.innerHTML ="<div>" + pro_name + ' <a href="#" onclick="remove_related_product(' + id + '); return false;">[Xóa]</a></div>';
	
}

function remove_related_product(id){
	try{
		$('related_list').removeChild($('related_'+id));
		$('related_list').removeChild($('input_related_'+id));
		check = $('check_'+id);
		if(check) $('check_'+id).checked=false; 
	}catch(err){}
}

function addRelatedProducts(){
	$$('div.related_products').each(function(el) {
				if( window.parent.addRelatedProducts(el)){
					input = $("input_"+el.id);
					window.parent.addRelatedProducts(input);
				}

			});
	/*$('related_list').getElements('input').each(function(el) {
				window.parent.addRelatedProducts(el);
	
			});	*/	

}

</script>