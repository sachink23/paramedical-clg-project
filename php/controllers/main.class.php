<?php
	/**
	 * This is the main class for the app which handles activities such as controlling the app using mvc.
	 */
	class mainClass
	{
		
		function __construct() {
			$this->initializeApp();
		}
		function initializeApp() {
			$this->redirectToHost();
			$this->checkSSL();
			$this->checkMode();
		}
		private function redirectToHost() {
			if($_SERVER["HTTP_HOST"] != appHost) {
				if(ssl == true) {
					$pref = "https://";
				}
				else {
					$pref = "http://";
				}
 				http_response_code(301);

				header("Location: ".$pref.appHost."/".$_SERVER["REQUEST_URI"]);
				exit;
			}
			return true;
		}
		private function checkSSL() {
			if(ssl == true) {
				if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    				return true;
				}
				else {
					http_response_code(301);
					header("Location: https://".appHost."/".$_SERVER["REQUEST_URI"]);
					exit;		
				}
			}
			return true;
		}
		private function checkMode() {
			if(mode == "w") {
				return true;
			}
			else if(mode == "uc") {
				http_response_code(503);
			}
			else if(mode == "m") {
				http_response_code(503);
			}
		}

	}