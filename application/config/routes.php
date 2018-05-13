<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

$route['admin'] = 'login';


$route['rest_api'] = 'rest_api';

//$route['404_override'] = '';
//$route['dashboard'] = 'dashboard';
//$route['Verifylogin'] = 'Verifylogin';

//$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'pages/index';
//$route['jacademy'] = 'pages/jacademy';
$route['jacademy/(:any)'] = 'pages/jacademy/$1';
$route['courses'] = 'pages/courses';
$route['courses/(:any)'] = 'pages/courses/$1';
$route['course/(:any)'] = 'pages/course/$1';
$route['paths'] = 'pages/paths';
$route['paths/(:any)'] = 'pages/paths/$1';
$route['shooting-day'] = 'pages/shootingday';
$route['international-events'] = 'pages/internationalevents';
$route['contacts'] = 'pages/contacts';
//$route['(:any)/(:sub)'] = "pages/view/$1";
$route['assets/(:any)'] = 'assets/$1';

/*
$controllers_methods = array(
    'en' => array(
        'home' => 'home',
        'jacademy' => 'jacademy',
        'corsi' => 'courses',
        'shooting-day' => 'shooting-day'
    ),
    'it' => array(
        'home' => 'home',
        'jacademy' => 'jacademy',
        'corsi' => 'corsi',
        'shooting-day' => 'shooting-day'
    )
);

$route['^(\w{2})/(.*)'] = function($language, $link) use ($controllers_methods)
{
    if(array_key_exists($language,$controllers_methods))
    {
        foreach ($controllers_methods[$language] as $key => $sym_link) {
            if (strrpos($link, $key, 0) !== FALSE) {
                $new_link = ltrim($link, $key);
                $new_link = $sym_link . $new_link;
                return $new_link;
            }
            else
            {
                return 'findcontent/index';
            }
        }
    }
    else
    {
        return $link;
    }
};
$route['^(\w{2})$'] = $route['default_controller'];
*/

/*
// '/en' and '/fr' URIs -defining language characters to your website

$route['^en/(.+)$'] = "$1";
$route['^it/(.+)$'] = "$1";
$route['^es/(.+)$'] = "$1";

// '/en' and '/fr' URIs -> use default controller

$route['^en$'] = $route['default_controller'];
$route['^it$'] = $route['default_controller'];
$route['^es$'] = $route['default_controller'];
*/