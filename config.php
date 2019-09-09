<?php
	# comment below three lines when you move to production
	/*
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	*/
	#basic website related information
	define('appName', 'ARYAWART PARA MEDICAL EDUCATION, VOCATIONAL & SELF EMPLOYMENT EDUCATION, BOARD');
	define('appTagline', 'Clg Tagline');
	define('appDesc', 'Description');
	define('appDev', '');
	define('hostCheck', 0);
	if(hostCheck == 0)
		define('appHost', $_SERVER['HTTP_HOST']);
	else 
		define('appHost', "paramedicalboard.com");

	/* Don't Change app secret once created */
	define('appSecret', 'mpBk69KnbNbInSVYDCV');

	#App mode controllers
	define('mode', 'w'); # uc - under construction ++ m- maintainance ++ w - working properly
	define('ssl', false);
	if(ssl == false) {
		define('appProtocol', 'http://');
	}
	else {
		define('appProtocol', "https://");
	}
	
	#basic files and folders related infotmation
	define('appRoot', __DIR__);
	define('phpDir', appRoot.'/php');
	define('routeFile', appRoot.'/routes.php');
	define('classDir', phpDir.'/classes');
	define('contrDir', phpDir.'/controllers');	
	define('apiDir', phpDir.'/api');
	#default cdn for website
	define('webCdn', "/assets");
	define('fileUploadDir', appRoot.'/assets/uploads/');

	#db related information
	define('dbHost','localhost');
	define('dbUser', 'sachin');
	define('dbPass', 'sachin');
	define('dbName', 'paraclg');
	

	

	


	
