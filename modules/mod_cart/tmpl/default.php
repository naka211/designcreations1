<?php
$db = &JFactory::getDBO();
$session =& JFactory::getSession();
$price = 0;
for($i=1; $i<=$session->get('subtotal'); $i++){
	$price += $session->get('price'.$i);
}
?>
 <div id="cart" class="flr">
    <a class="shopping-cart" href="index.php?option=com_ecommerce&task=kurv">
        <span class="link">Indkøbskurven</span>
        <span class="cart-info">Du har: <?php if($session->get('subtotal'))echo $session->get('subtotal');else echo "0";?> &nbsp;|&nbsp; Total: DKK&nbsp; <?php echo number_format($price,0,',','.');?></span>
    </a>
</div>