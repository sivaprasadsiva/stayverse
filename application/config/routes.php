<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 		 = 'userpanel/index1';
$route['index']                      = 'userpanel';
$route['admin']                      = 'dashboard_admin';
$route['loginPage']                  = 'login_register';
$route['loginPage_homestay']         = 'login_register/homestay_login';
$route['404_override'] 				 = '';
$route['translate_uri_dashes'] 		 = FALSE;