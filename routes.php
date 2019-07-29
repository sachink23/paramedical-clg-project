<?php
	/*

		#	This file handles all the urls which are being used all over the application
		#	To set this routes we have set_route method in class route -> php/classes/routes.php
		#	All the routes are set_route with three argument 1) $route 2) $type 3) $path (action)
		#	
			$route -
				# this is the url path

			$types - 
				# We have following types in the routes 
					1) page -> this will be a simple page with access to everyone
					2) error -> Here all the errors will be defined such as 404, 403, 500
					3) admin-dash -> This is the route where admin will have access
					4) 301 -> 301 redirect to $path
					5) 302 -> 302 redirect to $path
					6) api -> api redirects to a file in a folder php/api/ which gives response in json

			$path - 
				# path parameter will have the name of file which is present in the controller folder of the respective types
	*/
			
	# Website Routes -
	route::set_route('/', 'page', 'home');
