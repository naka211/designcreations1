<?php

defined('_JEXEC') or die('Restricted access');

class modBuyHelper
{
	function getProduct($catid)
	{
		global $mainframe, $option;
		$db	=& JFactory::getDBO();
		
		$query = 'SELECT * FROM #__pr_product  ';
		$query .= "  WHERE  category_id = ".$catid;

		$db->setQuery($query);
		$rows = $db->loadObjectList();
		
		return $rows;
	}	

}
