<?php
$db = &JFactory::getDBO();
$session =& JFactory::getSession();
$price = 0;
for($i=1; $i<=$session->get('subtotal'); $i++){
	$price += $session->get('price'.$i);
}
?>
 <div id="cart" class="flr">
    <a class="shopping-cart" href="index.php?option=com_ecommerce&task=basket">
        <span class="link">Indkøbskurven</span>
        <span class="cart-info">Du har: <?php echo $session->get('subtotal');?> &nbsp;|&nbsp; Total: DKK&nbsp; <?php echo $price;?>,- </span>
    </a>
</div>