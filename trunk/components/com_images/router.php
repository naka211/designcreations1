<?php

function ImagesBuildRoute(&$query)
{
	$segments = array();
	if (isset($query['view'])) {
		//$segments[] = $query['view'];
		unset($query['view']);
	}
	if(isset($query['active']))
	{
		$segments[] = $query['active'];
		unset($query['active']);
	}
	
	return $segments;
}

function ImagesParseRoute($segments)
{
	//print_r($segments); die();
	$vars = array();
	$vars['view'] = 'portefolje';
	$vars['active'] = $segments[0];
	//print_r($vars); die();
	return $vars;
}
?>