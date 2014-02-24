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
		alert( "Please enter product name" );
	} else if(form.cat_id.value == 0){
		alert( "Please select product category" );
	} else {
		submitform( pressbutton );
	}
}

</script>


<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
  <div class="col100">
  <fieldset class="adminform">
  <legend><?php echo JText::_( 'Manage product infomation' ); ?></legend>
  <table class="admintable">
    <tr>
      <td width="200" align="right" class="key"><label for="title_on_link"> <?php echo JText::_( 'Product name' ); ?>: </label>
      </td>
      <td><input class="text_area" type="text" name="name" id="name" size="32" maxlength="250" value="<?php echo htmlspecialchars($this->product->name);?>" />
      </td>
    </tr>
     
    <tr>
      <td width="200" align="right" class="key"><label for="code bar"> <?php echo JText::_( 'Price' ); ?>: </label>
      </td>
      <td><input class="text_area" type="text" name="price" id="price" size="32" maxlength="250" value="<?php echo $this->product->price;?>" /> DKK
      </td>
    </tr>
    
     <tr>
      <td width="200" align="right" class="key"><label for="code bar"> <?php echo JText::_( 'Promotion Price' ); ?>: </label>
      </td>
      <td><input class="text_area" type="text" name="promotion_price" id="promotion_price" size="32" maxlength="250" value="<?php echo $this->product->promotion_price;?>" /> DKK
      </td>
    </tr>
   
    <tr>
      <td width="200" align="right" class="key"><label for="desc_on_link"> <?php echo JText::_( 'Product category' ); ?>: </label>
      </td>
      <td><select name="cat_id">
          <option value="0">--Select category--</option>
            <?php echo $this->catoption; ?>
         
        </select>
      </td>
    </tr>
  
    <tr>
      <td width="200" align="right" class="key"><label for="desc_on_link">Description: </label>
      </td>
      <td><?php echo $editor->display( 'description', $this->product->description , '100%', '150', '75', '20' ) ; ?> </td>
    </tr>
    
   <!-- <tr>
      <td width="200" align="right" class="key"><label for="imagefile"> <?php echo JText::_( 'Upload price list ' ); ?>: </label>
      </td>
      <td><input type="file" name="pricelist" id="pricelist" size="32"  value="" /> <?php if($this->product->pricelist) echo $this->product->pricelist;?>
      <input type="hidden" name="pricelist1" value="<?php echo $this->product->pricelist; ?>" />
      </td>
    </tr>-->
   
    <tr>
      <td width="200" align="right" class="key">Product image:</td>
      <td><?php $dir = $this->product->id+999-(($this->product->id-1)%1000); 
	  	if(trim($this->product->image)):
	  ?>
        <img src="<?php echo '../components/com_ecommerce/imgupload/'.$this->product->image; ?>" width="55" border="0" align="middle" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo $link;?>"><img src="images/publish_x.png" align="absmiddle" />Xóa</a>
		<?php endif;?>
		<input type="hidden" name="image" value="<?php echo $this->product->image; ?>" /></td>
    </tr>
    
    <tr>
      <td width="200" align="right" class="key"><label for="imagefile"> <?php echo JText::_( 'Upload Image ' ); ?>: </label>
      </td>
      <td><input type="file" name="txthinh" id="txthinh" size="32"  value="" />
      </td>
    </tr>
    
  </table>

  </fieldset>
  </div>
  <div class="clr"></div>
  <input type="hidden" name="option" value="com_ecommerce" />
  <input type="hidden" name="id" value="<?php echo $this->product->id; ?>" />
  <input type="hidden" name="published" value="1" />
  <input type="hidden" name="task" id="task" value="" />
  <input type="hidden" name="listcat" value="" />
  <input type="hidden" name="controller" value="products" />
</form>
