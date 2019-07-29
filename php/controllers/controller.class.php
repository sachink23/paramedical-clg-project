<?php
	/**
	 * This class controls all the routing process
	 */
	class controller
	{
		
		function __construct()
		{
			
		}

		protected function loadPage($array) {
		
			print_r($array);
			# require_once activeThemeDir.'/landingPages/landigPage.php';
		}

		protected function loadPageSpecial($array) {
			# print_r($array);
			require_once activeThemeDir.'/landingPages/'.$array['path'].'.php';
		}

		protected function loadError($array) {
			http_response_code($array['route']);
			require_once activeThemeDir.'/errors/'.$array['route'].'.php';
		}
		protected function loadAdmin($array) {
			require_once contrDir.'/adminAuth.php';
			$auth = new adminAuth;
			if(!$auth->isLoginAdmin()) {
				$url = "/admin/login/";
				header("Location: ".$url);
				exit;
			}
			$adminName = ucfirst($_SESSION['admin_f_name'] . ' '. $_SESSION['admin_l_name']);
			$adminEmail = 'kekarjawalekarsachin@gmail.com';
			require_once contrDir.'/admin/'.$array['path'].'.php';
			require_once activeThemeDir.'/admin/template.php';
		}

		protected function loadAdminAPI($array) {
			header("Content-type: application/json");
	 		// error_reporting(0);
			require_once contrDir.'/adminAuth.php';
			$auth = new adminAuth;
			if(!$auth->isLoginAdmin()) {
				http_response_code(403);
				$this->accessDenied();
			}
			$response = new stdClass;
			require_once apiDir."/".$array['path'].".api.php";
		}

		protected function loadAPI($array) {
			header("Content-type: application/json");
			error_reporting(0);
			$response = new stdClass;
			/*
			if(explode('/', $_SERVER['HTTP_REFERER'])[2] != appHost){
				$this->accessDenied();
			}*/
			require_once apiDir."/".$array['path'].".api.php";
		}
		protected function badRequest($msg = "Bad Request") {
			$response = new stdClass;
			$response->code = 400;
			$response->message = $msg;
			die(json_encode($response));
		}
		protected function accessDenied($msg = "Access Denied") {
			$response = new stdClass;
			$response->code = 403;
			$response->message = $msg;
			$res = json_encode($response);
			die($res);
		}
		protected function validateGet($validGetArray, $array) {
			$j = 0;
			/* simply developed api key logic using phpssid
			if($_SERVER["REMOTE_ADDR"] <> "127.0.0.1" || $_SERVER["REMOTE_ADDR"] <> "127.0.1.1") {
				$validGetArray[]="apiKey";
				if($_COOKIE['PHPSESSID'] <> $_GET['apiKey']) {
					$this->accessDenied("Access denied, please provide valid api key");
				}
			}
			Not to be added yet
			refer xhr.class.js
			*/
			foreach ($array as $key => $value) {
				for ($i=0; $i < count($validGetArray) ; $i++) { 
					
					if($validGetArray[$i] == $key){
						$j++;
						break;
					}
				}
			}
			if($j!=count($array)) {
				return false;
			}
			return true;
		}
	}