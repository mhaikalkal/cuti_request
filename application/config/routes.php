<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['auth'] => ini buat redirect('auth'); 

// Login
$route['auth'] = 'Auth/login'; // Controller/view-nya
$route['auth_process'] = 'Auth/auth_process'; // biar bisa form_open harus di route dulu

// Admin
$route['admin'] = 'Admin/index'; // Controller/function

// HRD
$route['manager'] = 'Manager/index'; // Controller/view-nya

// Karyawan
$route['staff'] = 'Staff/index'; // Controller/view-nya

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
