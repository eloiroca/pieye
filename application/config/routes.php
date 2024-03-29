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
$route['default_controller'] = 'intranet';
$route['software-windows'] = 'intranet/mostrar_software_windows';
$route['software-apple'] = 'intranet/mostrar_software_apple';
$route['software-android'] = 'intranet/mostrar_software_android';
$route['passwords'] = 'password';

/*VEHICLES*/
$route['vehiculos'] = 'vehicle';
$route['gestio_vehicles'] = 'vehicle/grosery_vehicles/add';
$route['gestio_vehicles/add'] = 'vehicle/grosery_vehicles/add';
$route['gestio_vehicles/insert'] = 'vehicle/grosery_vehicles/insert';
$route['gestio_vehicles/insert_validation'] = 'vehicle/grosery_vehicles/insert_validation';
$route['gestio_vehicles/update_validation/:num'] = 'vehicle/grosery_vehicles/update_validation';
$route['gestio_vehicles/update/:num'] = 'vehicle/grosery_vehicles/update';
$route['gestio_vehicles/success/:num'] = 'vehicle/grosery_vehicles/success';
$route['gestio_vehicles/delete/:num'] = 'vehicle/grosery_vehicles/delete';
$route['gestio_vehicles/edit/:num'] = 'vehicle/grosery_vehicles/edit';
$route['gestio_vehicles/ajax_list_info'] = 'vehicle/grosery_vehicles/ajax_list_info';
$route['gestio_vehicles/ajax_list'] = 'vehicle/grosery_vehicles/ajax_list';

$route['vehiculos/vehiculo_timeline/(:num)'] = 'vehicle/vehicle_timeline/$1';
$route['vehiculos/registro_timeline'] = 'vehicle/registre_timeline';

$route['configuracion'] = 'configuracio';












$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
