<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once (JPATH_COMPONENT.DS.'controller.php');

// Require specific controller if requested
if(!$controller = JRequest::getVar('controller')) {
	$controller = "images"; //if no controller specified, set to default controller
}

require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
JRequest::setVar( 'view', $controller );
// Create the controller
$classname	= 'ImagesController'.ucfirst($controller);
$controller	= new $classname( );

// Perform the Request task
$controller->execute( JRequest::getVar('task'));
$controller->redirect();
?>