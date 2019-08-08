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
			require_once appRoot.'/frontend/website/template.php';	
		}

		protected function loadPageSpecial($array) {
			require_once appRoot.'/frontend/website/'.$array['path'].'.php';
		}

		protected function loadError($array) {
			http_response_code($array['route']);
			require_once appRoot.'/frontend/errors/'.$array['route'].'.php';
		}
		protected function loadAdmin($array) {
			require_once contrDir.'/adminAuth.php';
			$auth = new adminAuth;
			if(!$auth->isLoginAdmin()) {
				$url = "/admin/login/";
				header("Location: ".$url);
				exit;
			}
			
			require_once appRoot.'/frontend/admin/template.php';
		}
		protected function accessLevelRequired($level_name) {
			if($_SESSION['admin_'.$level_name] == 1) {
				return true;
			}
			$this->accessDenied("You dont have access to ".$level_name.", contact your administractor to know more");
		}
		protected function loadApi($array) {
			header("Content-type: application/json");
			$response = new stdClass;
			require_once apiDir."/".$array['path'].".api.php";
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