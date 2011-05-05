<?php
defined('_JEXEC') or die('Restricted access');
class TableOrders extends JTable{
	var $order_id = null;
	var $order_date = null;
	var $order_user_id = null;
	var $order_contact_name = null;
	var $order_address = null;
	var $order_phone = null;
	var $order_fax = null;
	var $order_email = null;
	var $order_total = null;
	var $order_method = null;
	var $order_status = null;

	function __construct(&$db){
		parent::__construct('#__pr_orders', 'order_id', $db);
	}
}
?>  
