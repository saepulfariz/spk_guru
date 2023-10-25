<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['user']['get'] = 'user/index';
$route['user']['post'] = 'user/create';
$route['user/new']['get'] = 'user/new';
$route['user/(:any)/edit']['get'] = 'user/edit/$1';
$route['user/(:any)']['get'] = 'user/edit/$1';
$route['user/(:any)']['post'] = 'user/update/$1';
$route['user/(:any)/delete'] = 'user/delete/$1';

$route['gantipass']['get'] = 'user/gantipass';
$route['gantipass']['post'] = 'user/prosesGantipass';

$route['profile']['get'] = 'user/profile';
$route['profile/edit']['get'] = 'user/editProfile';
$route['profile']['post'] = 'user/prosesProfile';


$route['alternatif']['get'] = 'alternatif/index';
$route['alternatif']['post'] = 'alternatif/create';
$route['alternatif/new']['get'] = 'alternatif/new';
$route['alternatif/(:any)/edit']['get'] = 'alternatif/edit/$1';
$route['alternatif/(:any)']['get'] = 'alternatif/edit/$1';
$route['alternatif/(:any)']['post'] = 'alternatif/update/$1';
$route['alternatif/(:any)/delete'] = 'alternatif/delete/$1';

$route['sub_alternatif']['get'] = 'SubAlternatif/index';
$route['sub_alternatif']['post'] = 'SubAlternatif/create';
$route['sub_alternatif/new']['get'] = 'SubAlternatif/new';
$route['sub_alternatif/(:any)/edit']['get'] = 'SubAlternatif/edit/$1';
$route['sub_alternatif/(:any)']['get'] = 'SubAlternatif/edit/$1';
$route['sub_alternatif/(:any)']['post'] = 'SubAlternatif/update/$1';
$route['sub_alternatif/(:any)/delete'] = 'SubAlternatif/delete/$1';



$route['guru']['get'] = 'guru/index';
$route['guru']['post'] = 'guru/create';
$route['guru/new']['get'] = 'guru/new';
$route['guru/(:any)/edit']['get'] = 'guru/edit/$1';
$route['guru/(:any)']['get'] = 'guru/edit/$1';
$route['guru/(:any)']['post'] = 'guru/update/$1';
$route['guru/(:any)/delete'] = 'guru/delete/$1';


$route['bobot_alternatif']['get'] = 'BobotAlternatif/index';
$route['bobot_alternatif']['post'] = 'BobotAlternatif/create';
$route['bobot_alternatif/new']['get'] = 'BobotAlternatif/new';
$route['bobot_alternatif/(:any)/edit']['get'] = 'BobotAlternatif/edit/$1';
$route['bobot_alternatif/(:any)']['get'] = 'BobotAlternatif/edit/$1';
$route['bobot_alternatif/(:any)']['post'] = 'BobotAlternatif/update/$1';
$route['bobot_alternatif/(:any)/delete'] = 'BobotAlternatif/delete/$1';


$route['perhitungan']['get'] = 'perhitungan/index';

$route['seleksi']['get'] = 'seleksi/index';
$route['seleksi/(:any)/edit']['get'] = 'seleksi/edit/$1';
$route['seleksi/(:any)']['get'] = 'seleksi/show/$1';
$route['seleksi/(:any)']['post'] = 'seleksi/update/$1';

$route['hasil']['get'] = 'seleksi/index';
$route['hasil/(:any)']['get'] = 'seleksi/show/$1';


$route['informasi']['get'] = 'informasi/index';
$route['informasi/(:any)']['get'] = 'informasi/show/$1';

$route['formulir']['get'] = 'formulir/index';
$route['formulir/(:any)']['post'] = 'formulir/update/$1';
