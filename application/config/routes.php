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

$route['login']='auth';
$route['login/proses']='auth/login';
$route['logout']='auth/logout';

$route['produk']              = 'Produk/index';
$route['produk/tambah']       = 'Produk/tambah';
$route['produk/simpan']       = 'Produk/simpan';
$route['produk/edit/(:num)']  = 'Produk/edit/$1';
$route['produk/update/(:num)']= 'Produk/update/$1';
$route['produk/hapus/(:num)'] = 'Produk/hapus/$1';

$route['pelanggan']               = 'Pelanggan/index';
$route['pelanggan/tambah']        = 'Pelanggan/tambah';
$route['pelanggan/simpan']        = 'Pelanggan/simpan';
$route['pelanggan/edit/(:num)']   = 'Pelanggan/edit/$1';
$route['pelanggan/update/(:num)'] = 'Pelanggan/update/$1';
$route['pelanggan/hapus/(:num)']  = 'Pelanggan/hapus/$1';

$route['salesorder']                  = 'SalesOrder/index';
$route['salesorder/tambah']           = 'SalesOrder/tambah';
$route['salesorder/simpan']           = 'SalesOrder/simpan';
$route['salesorder/detail/(:num)']    = 'SalesOrder/detail/$1';
$route['salesorder/ubah_status/(:num)'] = 'SalesOrder/ubah_status/$1';

$route['laporan']           = 'Laporan/index';
$route['laporan/cetak_pdf'] = 'Laporan/cetak_pdf';

$route['users']               = 'Users/index';
$route['users/tambah']        = 'Users/tambah';
$route['users/simpan']        = 'Users/simpan';
$route['users/edit/(:num)']   = 'Users/edit/$1';
$route['users/update/(:num)'] = 'Users/update/$1';
$route['users/hapus/(:num)']  = 'Users/hapus/$1';
