<?php
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once ('modules/mod_buy/helper.php');

$product = modBuyHelper::getProduct(1);
$packages = modBuyHelper::getProduct(2);
$websites = modBuyHelper::getProduct(3);
$webshops = modBuyHelper::getProduct(4);
require(JModuleHelper::getLayoutPath('mod_buy'));


?>
