<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'guestcontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['admin_old'] = 'guestcontroller/dashboard_old';

$route['admin'] = 'admincontroller';
$route['dashboard'] = 'admincontroller/dashboard';
$route['admin/manage_rooms'] = 'admincontroller/manage_rooms';
$route['admin/calendar'] = 'admincontroller/calendar';
$route['admin/bookings'] = 'admincontroller/bookings';
$route['admin/history'] = 'admincontroller/history';
