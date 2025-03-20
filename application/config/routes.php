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
// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;

$route['default_controller'] = 'auth/login_peminjam';
// $route['login'] = 'auth/loginpage';
$route['login_peminjam'] = 'auth/login_peminjam';
$route['Login'] = 'auth/login';
$route['P_Login'] = 'auth/p_login';
$route['Ad_Login'] = 'auth/login_ad';
$route['Register'] = 'auth/register';
$route['dashboard'] = 'peminjam/dashboard';
$route['buku_fiksi'] = 'Admin/buku_fiksi';
$route['buku_nonfiksi'] = 'Admin/buku_nonfiksi';
$route['buku_pendidikan'] = 'Admin/buku_pendidikan';
$route['dash_petugas'] = 'petugas/dashboard';
$route['buku_petugas'] = 'petugas/buku_petugas';
$route['Tambah_Buku'] = 'petugas/insert_buku';
$route['update_buku/(.+)'] = 'petugas/update_buku/$1';
$route['Delete_buku/(.+)'] = 'Petugas/delete_buku/$1';
$route['logout'] = 'auth/logout';
$route['Pinjam'] = 'Admin/pinjam';
$route['List_pinjaman'] = 'Admin/list_pinjaman';
$route['Peminjaman'] = 'Petugas/peminjaman';
$route['update_peminjaman/(.+)'] = 'Petugas/update_peminjaman/$1';
$route['Delete_peminjaman/(.+)'] = 'Petugas/delete_peminjaman/$1';
$route['ulasan_add'] = 'Admin/add';
$route['Administrator'] = 'Administrator/register';
$route['Tambah_User'] = 'Administrator/tambah_user';
$route['kategori_buku'] = 'petugas/kategori_buku';
$route['generate_laporan'] = 'Administrator/generate_laporan';
$route['denda_petugas'] = 'petugas/denda_petugas';
$route['Denda'] = 'petugas/denda_update';
$route['Delete_denda/(.+)'] = 'petugas/denda_delete/$1';
$route['auth/logout'] = 'auth/logout';
$route['auth/logout2'] = 'auth/logout2';

// $route['Peminjaman']     = 'Denda/create';

// $route['generate_laporan'] = 'Administrator/download_all';

// Route::get('/download-pdf', [PdfController::class, 'downloadPdf'])->name('download.pdf');
