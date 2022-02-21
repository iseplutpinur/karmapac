<?php
defined('BASEPATH') or exit('No direct script access allowed');

// =====================================================================================================================
// System ==============================================================================================================
$route['default_controller'] = 'home';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = TRUE;

// =====================================================================================================================
// Javascript ==========================================================================================================
$route['javascripts/(:any).js'] = 'loader/javascripts/$1';
$route['javascripts/contents/(:any).js'] = 'loader/javascripts_contents/$1';
$route['javascripts/contents/(:any)/(:any).js'] = 'loader/javascripts_contents/$1/$2';
$route['javascripts/contents/(:any)/(:any)/(:any).js'] = 'loader/javascripts_contents/$1/$2/$3';
$route['javascripts/contents/(:any)/(:any)/(:any)/(:any).js'] = 'loader/javascripts_contents/$1/$2/$3/$4';
$route['javascripts/contents/(:any)/(:any)/(:any)/(:any)/(:any).js'] = 'loader/javascripts_contents/$1/$2/$3/$4/$5';

// Stylesheets =========================================================================================================
$route['stylesheets/(:any).css'] = 'loader/stylesheets/$1';
$route['stylesheets/contents/(:any).js'] = 'loader/stylesheets_contents/$1';
$route['stylesheets/contents/(:any)/(:any).js'] = 'loader/stylesheets_contents/$1/$2';
$route['stylesheets/contents/(:any)/(:any)/(:any).js'] = 'loader/stylesheets_contents/$1/$2/$3';

// =====================================================================================================================
// Admin Login =========================================================================================================
$route['admin']      = 'admin/login';
$route['pengaturan/hakakseslevel/(:num)'] = 'pengaturan/hakAksesLevel/index/$1';

// =====================================================================================================================
// frontend ============================================================================================================
$route['home'] = 'home/index';

// Galeri ==============================================================================================================
$route['galeri'] = 'frontend/galeri/index';
$route['galeri/detail/(:any)'] = 'frontend/galeri/detail/$1';

// Pendaftaran =========================================================================================================
$route['pendaftaran'] = 'frontend/pendaftaran/index';

// Kepengurusan ========================================================================================================
$route['kepengurusan/struktur'] = 'frontend/tentang/struktur_kepengurusan';
