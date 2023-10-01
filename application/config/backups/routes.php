<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 		= 'Home';
$route['404_override'] 				= 'Pages/error_404';

// Admin system router
$route['Gopanel'] 					= 'gopanel/Dashboard';
$route['gopanel'] 					= 'gopanel/Dashboard';
$route['gopanel/login'] 			= 'gopanel/auth/login';

// Products
$route['search/']					= 'Search/index';

//Category
$route['category/(:any)']			= 'Category/index/$1';

//Static pages
$route['404']						= 'Pages/error_404';
$route['about']						= 'Pages/about';
$route['contact']					= 'Pages/contact';
$route['testimonials']				= 'Pages/testimonials';
$route['faq']						= 'Pages/faq';
$route['services/(:any)']			= 'Pages/services/$1';
$route['how-to-download']                   = 'Pages/how_to_download';
// Other pages
// Blog
$route['blog']						= 'Blog/index';
$route['blog/page/(:any)']			= 'Blog/page/$1';
$route['blog/(:any)']				= 'Blog/index/$1';

// Ajax route
$route['order']						= 'Process/order';
$route['newsletter']				= 'Process/newsletter';
$route['contactFrom']				= 'Process/contactfrom';
$route['test']						= 'Process/test';

// System rotue
$route['404']						= 'Pages/error_404';
$route['lang/(:any)']				= 'Process/langChange/$1';

$route['translate_uri_dashes'] 		= FALSE;