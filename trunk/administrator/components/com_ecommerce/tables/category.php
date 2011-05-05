<?php
defined('_JEXEC') or die('Restricted access');
require_once(JPATH_COMPONENT_ADMINISTRATOR . DS . "libs" . DS . "functions.php");
class TableCategory extends JTable{
	var $id = null;
	var $name = null;
	var $alias = null;
	var $description = null;
	var $ordering = null;
	var $published = null;
	var $parent_id = null;

	function __construct(&$db){
		parent::__construct('#__pr_category', 'id', $db);
	}

	function check(){
		//if($this->alias==NULL) $this->alias = $this->name;
		//$this->alias = utf8_to_ascii($this->alias);
		if(empty($this->alias)) {
			$this->alias = $this->name;
		}
		$this->alias = JFilterOutput::stringURLSafe($this->alias);
		if(trim(str_replace('-','',$this->alias)) == '') {
			$datenow =& JFactory::getDate();
			$this->alias = $datenow->toFormat("%Y-%m-%d-%H-%M-%S");
		}
		return true;
	}
}
?>