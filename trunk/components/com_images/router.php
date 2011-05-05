<?php

function ImagesBuildRoute(&$query)
{
	$segments = array();
	if (isset($query['view'])) {
		//$segments[] = $query['view'];
		unset($query['view']);
	}
	if(isset($query['catid']))
	{
		$segments[] = $query['catid'];
		unset($query['catid']);
	}
	if(isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}
	
	return $segments;
}

function ImageParseRoute($segments)
{
	//print_r($segments); die();
	$vars = array();
	$vars['view'] = $segments[0];
	if($vars['view']=="list") $vars['catid'] = intval($segments[1]);
	if($vars['view']=="detail") $vars['id'] = intval($segments[2]);	
		
return $vars;
}
?>