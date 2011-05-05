<?
defined( '_JEXEC' ) or die( 'Restricted access' );
$editor = &JFactory::getEditor();
?>

<script language="javascript" type="text/javascript">
<!--
function submitbutton(pressbutton){

	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
			
	// do field validation
	if (form.name.value == ""){
		alert( "<?php echo JText::_( 'Category must have a title', true ); ?>" );
	} else {
		submitform( pressbutton );
	}
}
//-->
</script>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_( 'Category' ); ?></legend>

		<table class="admintable">
		<tr>
			<td width="100" align="right" class="key">
				<label>
					<?php echo JText::_( 'Category name' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="name" id="name" size="32" maxlength="250" value="<?php echo $this->category->name;?>" />
				
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label>
					<?php echo JText::_( 'alias' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="alias" id="alias" size="32" maxlength="250" value="<?php echo $this->category->alias;?>" />
				
			</td>
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="desc_on_link">
					<?php echo JText::_( 'Description' ); ?>:
				</label>
			</td>
			<td>
				<?php echo $editor->display( 'description', $this->category->description , '100%', '150', '75', '20' ) ; ?>
			</td>
		</tr>
		
		</tr>
		<tr>
			<td width="100" align="right" class="key">
				<label for="desc_on_link">
					<?php echo JText::_( 'Parent category' ); ?>:
				</label>
			</td>
			<td>
				<select name="parent_id">
                	<option value="">- - - Root category - - -</option>
					<?php
						$db =& JFactory::getDBO();
						$query = "select * from #__pr_category where published =1 and parent_id = 0 order by ordering";
						$db->setQuery($query);
						if ($rows = $db->loadObjectList()){
							foreach ($rows as $row){
								if ($row->id == $this->category->parent_id){
									echo "<option selected='selected' value='".$row->id."'>".$row->name."</option>";
								} else {
									echo "<option value='".$row->id."'>".$row->name."</option>";
								}
								$query = "select * from #__pr_category where published =1 and  parent_id = ". $row->id ." order by ordering";
								$db->setQuery($query);
								if($rs = $db->loadObjectList()){
									foreach($rs as $r){
										if ( $this->category->parent_id == $r->id ){
											echo "<option selected='selected' value='".$r->id."'> &nbsp;&nbsp;&nbsp;&nbsp;  |_".$r->name."</option>";
										} else {
											echo "<option value='".$r->id."'> &nbsp;&nbsp;&nbsp;&nbsp;  |_".$r->name."</option>";
										}
									}
								}
							}
						}
					?>
				</select>
			</td>
		</tr>
		

	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="categories" />
</form>