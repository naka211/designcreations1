<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.model' );

class EcommerceModelConfig extends JModel
{
	var $_config = null;
	var $_id = null;
	
	function __construct()
	{
		parent::__construct();
		$this->setId((int)$array[0]);
	}

	function setId($id)
	{
		$this->_id		= $id;
	}
	
	function &getConfig()
	{
		if (empty( $this->_config )) 
		{
			$query = ' SELECT * FROM #__pr_config ';
					
			$this->_db->setQuery( $query );
			$this->_config = $this->_db->loadAssocList("name");
		}
		return $this->_config;
	}
	
	function store()
	{
		$array_id = JRequest::getVar('cid',  0, '', 'array');
		$array_rate = JRequest::getVar('rate',  0, '', 'array');
		$n = count($array_id);
		$query = ' SELECT * FROM #__pr_config ';
		$this->_db->setQuery( $query );
		$result = $this->_db->loadObjectList(); 
		foreach($result  as $row){
			$name_config = $row->name;// print_r(	$name_config)
			$post_value = JRequest::getVar($name_config,NULL);
			if($post_value!=NULL){
				$query = "UPDATE #__pr_config SET value = '".$post_value."' WHERE name = '".$name_config."'";
				$this->_db->setQuery($query);
				$this->_db->query();
			}
		
		}
		return true;
	}
	
	function autoupdate()
	{
		$rate_xml = file_get_contents("http://www.iti.vn/ExchangeRates.php");
		$rate = new SimpleXMLElement($rate_xml);
				
		foreach($rate->Exrate as $currency)
		{
			$attributes =  $currency->attributes();
			if($attributes['CurrencyCode']=="USD"){
				$query = "UPDATE #__pr_config SET value = ".$attributes['Buy']." WHERE name = '".$attributes['CurrencyCode']."'";
				$this->_db->setQuery($query);
				$this->_db->query();
				break;
			}
		}
		return true;
	}
}
?>