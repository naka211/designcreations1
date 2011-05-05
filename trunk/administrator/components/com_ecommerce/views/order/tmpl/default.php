<?
defined( '_JEXEC' ) or die( 'Restricted access' );

?>
<div class="col100">
  <fieldset class="adminform">
  <legend><?php echo JText::_( 'Order detail' ); ?></legend>
  <table class="admintable">
  <?php foreach($this->cart as $product){ ?>
    <tr>
      <td width="200" align="right" class="key"><label for="title_on_link"> <?php echo $product->product_name; ?> </label>
      </td>
      <td>
      	Logo name:  <?php echo $product->logo_name; ?><br />
        Slogan:  <?php echo $product->slogan; ?><br />
        Industry/Profession:  <?php echo $product->profession; ?><br />
        Card size:  <?php echo $product->card; ?><br />
        Stationery type:  <?php echo $product->letter; ?><br />
        Brochure type:  <?php echo $product->brochure; ?><br />
        Message/Requirement:  <?php echo $product->info; ?><br />
        Requirement file:  <?php echo $product->logo_name; ?><br />
        Logo file:  <?php echo $product->logo_name; ?><br />
      </td>
    </tr>
  <?php }?>
  </table>

  </fieldset>
  </div>