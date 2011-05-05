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
		<legend><?php echo JText::_( 'Configuaration' ); ?></legend>

		<table class="admintable">
		<tr>
			<td  align="right" class="key" style="width:200px;">
				<label>
					<?php echo JText::_( 'Tax' ); ?>:
				</label>
			</td>
			<td>
				<input class="text_area" type="text" name="<?php echo $this->config["tax"]["name"];?>" id="<?php echo $this->config["tax"]["name"];?>" size="32" maxlength="250" value="<?php echo $this->config["tax"]["value"];?>" />
				
			</td>
		</tr>
	</table>
	</fieldset>
</div>
<div class="clr"></div>

<input type="hidden" name="option" value="com_ecommerce" />
<input type="hidden" name="id" value="<?php echo $this->category->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="config" />
</form>