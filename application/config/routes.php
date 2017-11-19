<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'diskusi/page';
$route['forum'] = 'diskusi/page';
$route['forum/tl'] = 'diskusi/timeline';
$route['forum/tl/(:any)'] = 'diskusi/timeline/$1';
$route['forum/tulis'] = 'diskusi/tulis';


$route['kontak-admin'] = 'user/kontakadm';
$route['pesan'] 	= 'user/pesan';
$route['pesan/x/(:any)'] = 'user/pesan_baca/$1';


$route['image'] = 'diskusi/image';


//aktivitas user 
$route['dashboard'] = 'user';
$route['login'] = 'user/login';
$route['profile/(:any)'] = 'user/profile/$1';
$route['login/in'] = 'user/login';
$route['register'] = 'user/register';
$route['register/in'] = 'user/ndaftar';
$route['logout'] = 'user/logout';



$route['arsip'] = 'diskusi/page';
$route['arsip/(:any)'] = 'diskusi/arsip/$1';
//$route['(:any)/(:any)'] = 'welcome/items/$1/$2';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;