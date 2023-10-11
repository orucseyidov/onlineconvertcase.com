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


//Rating routes
$route['feedback']					= 'Process/feedback';
$route['recommend']					= 'Process/recommend';

//Static pages
$route['about']						= 'Pages/about';
$route['faq']						= 'Pages/faq';
$route['contact']					= 'Pages/contact';




// Other pages
$route['robots.txt']				= 'Sitemap/robots';
$route['robots']					= 'Sitemap/robots';
$route['sitemap.xml']				= 'Sitemap/index';
$route['sitemap']					= 'Sitemap/index';
$route['rss.xml']					= 'Sitemap/rss';
$route['rss']						= 'Sitemap/rss';
$route['pingback']					= 'Pages/pingback';



//Statics pages
// require_once(BASEPATH . 'database/DB.php');
$db =& DB();
$static_pages 	= $db->get('static_pages')->result_array() ?? [];
foreach ($static_pages as $key => $value) {
	// $route['(:any)/'.$value['slug']]            = 'Pages/static_pages/$1';
	if ($value['type'] == 1) {
		$route[$value['slug']]            			= 'Pages/static_pages/$1';
	} else {
		$route[$value['slug']]            			= 'Pages/static_pages_seo/$1';
	}
}

$other_tools 	= $db->get('other_tools')->result_array() ?? [];
foreach ($other_tools as $key => $value) {
	// $route['(:any)/'.$value['slug']]            = 'Home/index/$1';
	$route[$value['slug']]            		= 'Home/index/$1';
}
$db->close();


// System rotue
$route['404']								= 'Pages/error_404';
$route['lang/(:any)']						= 'Process/langChange/$1';
$lanugages = $this->config->item('routes');

$route['(:any)'] 					= 'Home/language/$1';


// $route['(:any)']					= 'Process/language/$1';

$route['translate_uri_dashes'] 		= false;
// echo "<pre>";
// print_r($route);
// exit();