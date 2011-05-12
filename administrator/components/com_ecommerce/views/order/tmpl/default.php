<?
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<div class="col100">
  <fieldset class="adminform">
  <legend><?php echo JText::_( 'Order detail' ); ?></legend>
  
  <table class="admintable">
  <?php foreach($this->cart as $product){ ?>
    <tr>
      <td width="200" align="right" class="key">
      	<span style="font-size:16px"><?php echo $product->product_name; ?></span>
      </td>
      <td>
      	<?php if($product->logo_name){?>
      	<strong>Logo name:</strong>  <?php echo $product->logo_name; ?><br />
        <?php }?>
        <?php if($product->slogan){?>
        <strong>Slogan:</strong>  <?php echo $product->slogan; ?><br />
        <?php }?>
        <?php if($product->profession){?>
        <strong>Industry/Profession:</strong>  <?php echo $product->profession; ?><br />
        <?php }?>
        <?php if($product->card){?>
        <strong>Card size:</strong>  <?php echo $product->card; ?><br />
        <?php }?>
        <?php if($product->letter){?>
        <strong>Stationery type:</strong>  <?php echo $product->letter; ?><br />
        <?php }?>
        <?php if($product->brochure){?>
        <strong>Brochure type:</strong>  <?php echo $product->brochure; ?><br />
        <?php }?>
        <?php if($product->info){?>
        <strong>Message/Requirement:</strong>  <?php echo $product->info; ?><br />
        <?php }?>
        <?php if($product->request_file){?>
        <strong>Requirement file:</strong>  <a href="../images/fileupload/<?php echo $product->request_file; ?>"><?php echo $product->request_file; ?></a><br />
        <?php }?>
        <?php if($product->logo_file){?>
        <strong>Logo file:</strong>  <a href="../images/fileupload/<?php echo $product->logo_file; ?>"><?php echo $product->logo_file; ?></a><br />
        <?php }?>
      </td>
    </tr>
  <?php }?>
  </table>

  </fieldset>
  </div>