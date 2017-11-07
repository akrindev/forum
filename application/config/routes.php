<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'diskusi/page';
$route['forum'] = 'diskusi/page';
$route['forum/tl'] = 'diskusi/timeline';
$route['forum/tl/(:any)'] = 'diskusi/timeline/$1';
$route['forum/tulis'] = 'diskusi/tulis';

$route['image'] = 'diskusi/image';
/*
$route['page'] = 'diskusi/page';
$route['image/(:any)'] = 'diskusi/image/$1';
$route['page/(:any)'] = 'diskusi/page/$1';
*/
//zona elban
//$route['forum/elban'] = 'diskusi/elban';
//$route['forum/elban/(:any)'] = 'diskusi/elban/$1';


//aktivitas user 
$route['dashboard'] = 'user';
$route['login'] = 'user/login';
$route['profile/(:any)'] = 'user/profile/$1';
$route['login/in'] = 'user/login';
$route['register'] = 'user/register';
$route['register/in'] = 'user/ndaftar';
$route['logout'] = 'user/logout';



$route['stats'] = 'welcome/stats';
$route['quests'] = 'welcome/quests';
$route['raids'] = 'welcome/raids';
$route['abilities'] = 'welcome/abilities';
$route['lottery'] = 'welcome/lottery';
//$route['(:any)/(:any)'] = 'welcome/items/$1/$2';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;