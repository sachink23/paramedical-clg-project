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
	route::set_route('/about/', 'page', 'about');
	route::set_route('/circulars/', 'page', 'circulars');
	route::set_route('/courses/', 'page', 'courses');
	route::set_route('/legal-documents/', 'page', 'legal-documents');
	route::set_route('/results/', 'page', 'result');
	route::set_route('/online-admissions/', 'page', 'online-adm');
	route::set_route('/online-admissions/download/', 'page-special', 'online-adm-view');
	route::set_route('/downloads/', 'page', 'downloads');
	route::set_route('/contact/', 'page', 'contact');
	route::set_route('/admin/login/', 'page-special', 'admin-login');
	route::set_route('/admin/', 'admin', 'dashboard');
	route::set_route('/admin/admissions/', 'admin', 'admission');
	route::set_route('/admin/admissions/accepted/', 'admin', 'admission');
	route::set_route('/admin/admissions/accept/', 'admin', 'admission-acpt');

	route::set_route('/api/admin/notifications/', 'admin-api', 'admin/notifications');
	route::set_route('/api/admin/site-basics/', 'admin-api', 'admin/site-basics');
	route::set_route('/api/admin/results/', 'admin-api', 'admin/results');
	route::set_route('/api/admin/courses/', 'admin-api', 'admin/courses');
	route::set_route('/api/admin/users/', 'admin-api', 'admin/users');
	route::set_route('/api/results/', 'api', 'results');
	route::set_route('/api/admission/new/', 'api', 'admission/new');
	
	# Error Routes
	route::set_route('404', 'error', '404');
