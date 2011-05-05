<?php
defined('_JEXEC') or die('Restricted access');
class TableImage extends JTable{
	var $id = null;
	var $name = null;
	var $catid = null;
	var $thumb = null;
	var $full = null;
	var $ordering = null;
	var $publish = null;
		
	function __construct(&$db){
		parent::__construct('#__images', 'id', $db);
	}
}
?>
