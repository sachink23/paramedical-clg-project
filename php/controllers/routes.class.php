<?php

	/**
	 * Routes class is used to control all the routing processes in the LMS
	 */
	
	class route extends controller
	{
		private $curRouteId = -1;
		private $curRoute = array();
		public static $validRoutes = array();
		public static function set_route($route, $type, $path) {
			$routePresentLocation = 0;
			if(count(self::$validRoutes) != 0) {
				for ($i=0; $i<count(self::$validRoutes); $i++) { 
					if($route == self::$validRoutes[$i]['route']) {
						$routePresentLocation = $i;
						break;
					}

				}
			} 
			if($routePresentLocation == 0) {
				self::$validRoutes[] = array('route' => $route, 'type' => $type, 'path' => $path);
			}		
			else {
				trigger_error(htmlentities($route ." has been already set in validRoutes[". $i."][route]"), E_USER_ERROR);
			}
		}

		private function getCurrentRoute($route) {
			for($i=0; $i<(count(self::$validRoutes)); $i++) {
				if(self::$validRoutes[$i]['route'] == $route) {
					$this->curRouteId = $i;
					break;
				}
			}
			return $this->curRouteId;
			
		}
		private function routeNotFound($route) {
			$this->routeTo(404);
		}
		public function routeTo($route) {
			if($this->getCurrentRoute($route) != -1) {
				$control = new controller;
				$this->curRoute = self::$validRoutes[$this->curRouteId];
				switch ($this->curRoute['type']) {
						case 'page':
							$control->loadPage($this->curRoute);
							break;

						case 'page-special':
							$control->loadPageSpecial($this->curRoute);
							break;
						
						case 'admin':
							$control->loadAdmin($this->curRoute);
							break;
						
						case 'error':
							$control->loadError($this->curRoute);
							break;
						
						case "301":
							http_response_code(301);
							header("Location:".$this->curRoute['path']);
							break;

						case "302":
							http_response_code(302);
							header("Location:".$this->curRoute['path']);
							break;

						case "api":
							$control->loadAPI($this->curRoute);
							break;
						
						case "admin-api":
							$control->loadAdminAPI($this->curRoute);
							break;
						default:
							$this->routeTo(500);
							break;
					}	

			}

			else {
				$this->routeNotFound($route);
			}
		}
		
	}