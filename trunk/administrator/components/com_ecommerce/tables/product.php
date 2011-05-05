<?php
defined('_JEXEC') or die('Restricted access');
class TableProduct extends JTable{
	var $id = null;
	var $alias = null;
	var $name = null;
	var $description = null;
	var $ordering = null;
	var $published = null;
	var $category_id = null;
	var $price = null;
	var $promotion_price = null;
	var $pricelist = null;
	var $image = null;
	
	function __construct(&$db){
		parent::__construct('#__pr_product', 'id', $db);
	}
}
?>
