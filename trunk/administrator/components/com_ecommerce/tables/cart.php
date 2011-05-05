<?php
defined('_JEXEC') or die('Restricted access');
class TableCart extends JTable{
	var $id = null;
	var $code = null;
	var $product_id = null;
	var $quantity = null;
	var $price = null;
	var $date_buy = null;
	var $point = null;
	var $buyer_id = null;
	var $published = null;
	var $ordering = null;

	function __construct(&$db){
		parent::__construct('#__pr_cart', 'id', $db);
	}
}
?>  