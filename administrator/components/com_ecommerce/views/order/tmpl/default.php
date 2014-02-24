<?
defined( '_JEXEC' ) or die( 'Restricted access' );
$cid = JRequest::getVar('cid');
$db = JFactory::getDBO();
$query = "SELECT * FROM #__pr_orders WHERE order_id = ".$cid[0];
$db->setQuery($query);
$order = $db->loadObject();
$tmp = explode(' ',$order->order_date);
$tmp1 = explode('-',$tmp[0]);

$query = "SELECT * FROM #__pr_cart WHERE order_id = ".$order->order_id;
$db->setQuery($query);
$items = $db->loadObjectList();
?>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
<div class="col100">
  <fieldset class="adminform">
  <legend><?php echo JText::_( 'Order detail' ); ?></legend>
  
    <table width="70%" border="0" cellspacing="0">
    <tr valign="top"> 
    <td align="left" class="Stil1" colspan="2"><img src="../templates/tpl_designcreations/img/dc_logo.png" alt="vendor_image" border="0" /></td>
    </tr>
    <tr bgcolor="white"> 
    <td colspan="2">
      <h3 class="Stil2" style="margin:0">Ordrebekræftelse</h3>
    </td>
    </tr>
    </table>
    
    <table border="0" cellspacing="0" width="70%">
    
    <tr bgcolor="#CCCCCC" class="sectiontableheader"> 
    <td colspan="2" class="Stil2"><b>Ordreinformation</b></td>
    </tr>
    <tr class="Stil1"> 
    <td width="384">Ordre nummer:</td>
    <td width="855"><?php echo sprintf('%05d',$order->order_id);?></td>
    </tr>
    
    <tr class="Stil1"> 
    <td>Ordre dato:</td>
    <td><?php echo $tmp1[2].'-'.$tmp1[1].'-'.$tmp1[0];?></td>
    </tr>
    <tr bgcolor="#CCCCCC" class="sectiontableheader"> 
    <td colspan="2"><b class="Stil2">Kundeinformation</b></td>
    </tr>
    <tr valign="top"> 
    <td colspan="2" style="padding:0;">  
      <table width="100%" cellspacing="0" border="0" style="margin:0;">
        <tr> 
          <td colspan="2"><b>Faktureringsoplysninger</b></td>
        </tr>
        <tr class="Stil1"> 
          <td width="32%">Kundenavn:</td>
          <td width="68%"><?php echo $order->order_name;?></td>
        </tr>
         <tr class="Stil1"> 
          <td>Adresse:</td>
          <td><?php echo $order->order_address;?></td>
        </tr>
         <tr class="Stil1"> 
          <td>Postnummer:</td>
          <td><?php echo $order->order_zipcode;?></td>
        </tr>
         <tr class="Stil1"> 
          <td>By:</td>
          <td><?php echo $order->order_city;?></td>
        </tr>
         <tr class="Stil1"> 
          <td>Telefon:</td>
          <td><?php echo $order->order_phone;?></td>
        </tr>
        <tr class="Stil1"> 
          <td>Email:</td>
          <td><a href="mailto:<?php echo $order->order_email;?>"><?php echo $order->order_email;?></a></td>
        </tr>
        <tr class="Stil1"> 
          <td>Kommentar:</td>
          <td><?php echo $order->order_comment;?></td>
        </tr>
      </table>
      
    </td>
    
    <tr bgcolor="#CCCCCC" class="Stil2"> 
    <td colspan="2"><b>Ordrelinier</b></td>
    </tr>
    <tr> 
    <td colspan="2"> 
      <table width="100%" cellspacing="0" border="0">
        <tr class="Stil1">
            <th width="8%" style="text-align:center; border-bottom:1px solid #999;">Antal</th>
            <th width="46%" style="text-align:center; border-bottom:1px solid #999;">Navn</th>
            <th width="22%" style="text-align:center; border-bottom:1px solid #999;">Pris</th>
            <th width="24%" style="text-align:center; border-bottom:1px solid #999;">Subtotal</th>
        </tr>
        <?php foreach($items as $item){?>
        <tr class="Stil1">			
            <td style="text-align:center; border-bottom:1px solid #999;"><?php echo $item->quantity;?></th>
            <td style="text-align:center; border-bottom:1px solid #999;"><?php echo $item->product_name;?> 
            <a href="../index.php?option=com_ecommerce&view=orders&tmpl=component&id=<?php echo $item->id?>" rel="{handler: 'iframe', size: {x: 500, y: 350}}" class="modal"><img src="../images/detail.png" /></a></th>
            <td style="text-align:center; border-bottom:1px solid #999;">DKK <?php echo number_format($item->price,2,',','.');?></th>
            <td style="text-align:center; border-bottom:1px solid #999;">DKK <?php echo number_format($item->price * $item->quantity,2,',','.');?></th>
        </tr>
       <?php 
            $sub += $item->quantity * $item->price;
            $tax = $sub * 0.25;
            $all = $sub + $tax;
       }?>
        <tr class="Stil1"> 
          <td colspan="3" style="text-align:right;"><strong>Subtotal :</strong></td>
          <td style="text-align:center; font-weight:bold;">DKK <?php echo number_format($sub,2,',','.');?></td>
        </tr>
        
        <tr class="Stil1"> 
          <td colspan="3" style="text-align:right;"><strong>Heraf moms :</strong></td>
          <td style="text-align:center; font-weight:bold;">DKK <?php echo number_format($tax,2,',','.');?></td>
        </tr>
        <tr class="Stil1"> 
          <td colspan="3" style="text-align:right;"><b>At betale :</b></td>
          <td style="text-align:center; font-weight:bold;">DKK <?php echo number_format($all,2,',','.');?></td>
        </tr>
      </table>
    </td>
    </tr>  
    </table>

  </fieldset>
  </div>
 	<input type="hidden" name="option" value="com_ecommerce" />
    <input type="hidden" name="task" value="" />
    <input type="hidden" name="controller" value="orders" />
</form>