<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'diskusi/intro';
$route['forum'] = 'diskusi/page';
$route['forum/tl'] = 'diskusi/timeline';
$route['forum/tl/(:any)'] = 'diskusi/timeline/$1';
$route['forum/thread'] = 'diskusi/timeline';
$route['forum/thread/(:any)'] = 'diskusi/timeline/$1';
$route['tulis'] = 'diskusi/tulis';
$route['wp-admin/admin-ajax.php'] = 'diskusi/tulis';

$route['kontak-admin'] = 'user/kontakadm';
$route['pesan'] 	= 'user/pesan';
$route['pesan/x/(:any)'] = 'user/pesan_baca/$1';

$route['ga-2017'] = 'reset/gasub';

$route['sitemap\.xml'] = 'sitemap';
$route['sitemap-price\.xml'] = 'sitemap/price';
$route['image'] = 'diskusi/image';

$route['tutorial'] = 'diskusi/bbcode';
$route['kebijakan-privasi'] = 'diskusi/kprivasi';
$route['rules'] = 'diskusi/rules';

//aktivitas user 
$route['dashboard'] = 'user';
$route['login'] = 'user/login';
$route['profile/(:any)'] = 'user/profile/$1';
$route['login/in'] = 'user/login';
$route['register'] = 'user/register';
$route['register/in'] = 'user/ndaftar';
$route['logout'] = 'user/logout';

$route['klalen/x/token/(:any)'] = 'reset/reset_password/$1';

$route['pinned'] = 'reset/pinned_v';
$route['this/pinned'] = 'reset/pinned_v';

$route['arsip'] = 'diskusi/page';
$route['arsip/(:any)'] = 'diskusi/arsip/$1';
//$route['(:any)/(:any)'] = 'welcome/items/$1/$2';

$route['harga/items/(:any)'] = 'price/get_item_type/$1';
$route['harga/item/(:any)'] = 'price/single/$1';
$route['harga/cari'] = 'price/cari';

$route['i/price/(:any)/(:any)'] = 'price/get_item/$1/$2';



$route['404_override'] = 'reset/not_found';
$route['translate_uri_dashes'] = FALSE;