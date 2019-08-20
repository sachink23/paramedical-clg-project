<?php
	require_once __DIR__.'/config.php';
	require_once contrDir.'/main.class.php';
	require_once contrDir.'/controller.class.php';
	require_once contrDir.'/routes.class.php';
	require_once classDir.'/db.class.php';
	require_once routeFile;
	$initiate = new mainClass;
	$route = new route;
	if(!isset($_SERVER['REQUEST_URI'])) {
		die("Invalid Request");
	}
	$uri = explode('?', $_SERVER['REQUEST_URI']);
	$route->routeTo($uri[0]);


    
	
?>
