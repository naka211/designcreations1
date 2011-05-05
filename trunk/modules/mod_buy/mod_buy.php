<?php
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once ('modules/mod_buy/helper.php');

$product = modBuyHelper::getProduct(1);
$packages = modBuyHelper::getProduct(2);
require(JModuleHelper::getLayoutPath('mod_buy'));


?>
