<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

$editor = &JFactory::getEditor();
JFilterOutput::objectHTMLSafe( $this->item );
JHTML::_('behavior.calendar');
JHTML::_('behavior.modal', 'a.modal');
$document	=& JFactory::getDocument();
$link = JRoute::_( 'index.php?option=com_ecommerce&controller=products&task=delete_img&id='. $this->product->id );
?>
<script language="javascript">
function submitbutton(pressbutton){

	var form = document.adminForm;
	if (pressbutton == 'cancel') {
		submitform( pressbutton );
		return;
	}
			
	// do field validation
	if (form.name.value == ""){
		alert( "Please enter image name" );
	} else if(form.catid.value == 0){
		alert( "Please select image category" );
	} else {
		submitform( pressbutton );
	}
}

</script>


<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
  <div class="col100">
  <fieldset class="adminform">
  <legend><?php echo JText::_( 'Manage image infomation' ); ?></legend>
  <table class="admintable">
    <tr>
      <td width="200" align="right" class="key"><label for="title_on_link"> <?php echo JText::_( 'Image name' ); ?>: </label>
      </td>
      <td><input class="text_area" type="text" name="name" id="name" size="32" maxlength="250" value="<?php echo htmlspecialchars($this->image->name);?>" />
      </td>
    </tr>
    
     <tr>
      <td width="200" align="right" class="key"><label for="title_on_link"> <?php echo JText::_( 'Image category' ); ?>: </label>
      </td>
      <td>
      		<select name="catid" id="catid">
            <option value="0" >Select category</option>
            <option value="1" <?php if($this->image->catid == 1) echo 'selected="selected"';?>>Logo design</option>
            <option value="2" <?php if($this->image->catid == 2) echo 'selected="selected"';?>>Visitkort & Brevpapir</option>
            <option value="3" <?php if($this->image->catid == 3) echo 'selected="selected"';?>>Website Templates</option>
            <option value="4" <?php if($this->image->catid == 4) echo 'selected="selected"';?>>Webshop Templates</option>
            </select>
      </td>
    </tr>
    
   	 <tr>
      <td width="200" align="right" class="key"><label for="imagefile"> <?php echo JText::_( 'Upload image thumb ' ); ?>: </label>
      </td>
      <td><input type="file" name="thumb" id="thumb" size="32"  value="" />
      </td>
    </tr>
    <tr>
      <td width="200" align="right" class="key">Image thumb:</td>
      <td><?php 
	  	if(trim($this->image->thumb)):
	  ?>
        <img src="<?php echo '../images/imgupload/'.$this->image->thumb; ?>" border="0" />
		<?php endif;?>
		<input type="hidden" name="thumbimage" value="<?php echo $this->image->thumb; ?>" />
      </td>
    </tr>
    
    <tr>
      <td width="200" align="right" class="key"><label for="imagefile"> <?php echo JText::_( 'Upload image full ' ); ?>: </label>
      </td>
      <td><input type="file" name="full" id="full" size="32"  value="" />
      </td>
    </tr>
    <tr>
      <td width="200" align="right" class="key">Image full:</td>
      <td><?php 
	  	if(trim($this->image->full)):
	  ?>
        <img src="<?php echo '../images/imgupload/'.$this->image->full; ?>" border="0" />
		<?php endif;?>
		<input type="hidden" name="fullimage" value="<?php echo $this->image->full; ?>" />
      </td>
    </tr>
   
    
  </table>

  </fieldset>
  </div>
  <div class="clr"></div>
  <input type="hidden" name="option" value="com_images" />
  <input type="hidden" name="id" value="<?php echo $this->image->id; ?>" />
  <input type="hidden" name="task" id="task" value="" />
  <input type="hidden" name="publish" value="1" />
  <input type="hidden" name="controller" value="images" />
</form>
