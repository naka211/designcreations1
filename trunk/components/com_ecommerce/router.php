<?php

function ecommerceBuildRoute(&$query)
{
	$segments = array();
	/*if (isset($query['option'])) {
		$segments[] = $query['option'];
		unset($query['option']);
	}*/
	if (isset($query['view'])) {
		$segments[] = $query['view'];
		unset($query['view']);
	}
	
	//print_r($segments); exit();
	return $segments;
}

function ecommerceParseRoute($segments)
{
	//print_r($segments); exit();
	$vars = array();
	$vars['view'] = $segments[0];
		
	return $vars;
}
?>