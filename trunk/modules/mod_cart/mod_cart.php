<?php
defined('_JEXEC') or die('Restricted access');
require_once ('components/com_ecommerce/controller.php');
$ecom_config = EcommerceController::getConfig(); 
require(JModuleHelper::getLayoutPath('mod_cart'));

?>
