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
$route['default_controller'] = 'Auth';

$route['auth'] = 'Auth';

// ------------------------------------------------------------------------
// Admin
// ------------------------------------------------------------------------
$route['admin/dashboard']                                   = 'Admin/DashboardController';


$route['admin/bagian']                                      = 'Admin/BagianController';
$route['admin/bagian/create']                               = 'Admin/BagianController/create';
$route['admin/bagian/store']                                = 'Admin/BagianController/store';
$route['admin/bagian/edit/(:any)']                          = 'Admin/BagianController/edit/$1';
$route['admin/bagian/update']                               = 'Admin/BagianController/update';
$route['admin/bagian/delete/(:any)']                        = 'Admin/BagianController/delete/$1';

$route['admin/jabatan']                                     = 'Admin/JabatanController';
$route['admin/jabatan/create']                              = 'Admin/JabatanController/create';
$route['admin/jabatan/store']                               = 'Admin/JabatanController/store';
$route['admin/jabatan/edit/(:any)']                         = 'Admin/JabatanController/edit/$1';
$route['admin/jabatan/update']                              = 'Admin/JabatanController/update';
$route['admin/jabatan/delete/(:any)']                       = 'Admin/JabatanController/delete/$1';

$route['admin/karyawan']                                    = 'Admin/KaryawanController';
$route['admin/karyawan/create']                             = 'Admin/KaryawanController/create';
$route['admin/karyawan/store']                              = 'Admin/KaryawanController/store';
$route['admin/karyawan/edit/(:any)']                        = 'Admin/KaryawanController/edit/$1';
$route['admin/karyawan/update']                             = 'Admin/KaryawanController/update';
$route['admin/karyawan/delete/(:any)']                      = 'Admin/KaryawanController/delete/$1';

$route['admin/peminjaman']                                  = 'Admin/PeminjamanController';
$route['admin/peminjaman/create']                           = 'Admin/PeminjamanController/create';
$route['admin/peminjaman/store']                            = 'Admin/PeminjamanController/store';
$route['admin/peminjaman/edit/(:any)']                      = 'Admin/PeminjamanController/edit/$1';
$route['admin/peminjaman/update']                           = 'Admin/PeminjamanController/update';
$route['admin/peminjaman/delete/(:any)']                    = 'Admin/PeminjamanController/delete/$1';
$route['admin/peminjaman/change/(:any)']                    = 'Admin/PeminjamanController/change/$1';

$route['admin/absensi']                                     = 'Admin/AbsensiController';
$route['admin/absensi/create']                              = 'Admin/AbsensiController/create';
$route['admin/absensi/store']                               = 'Admin/AbsensiController/store';
$route['admin/absensi/edit/(:any)']                         = 'Admin/AbsensiController/edit/$1';
$route['admin/absensi/update']                              = 'Admin/AbsensiController/update';
$route['admin/absensi/delete/(:any)']                       = 'Admin/AbsensiController/delete/$1';

$route['admin/penggajian']                                  = 'Admin/PenggajianController';
$route['admin/penggajian/create']                           = 'Admin/PenggajianController/create';
$route['admin/penggajian/store']                            = 'Admin/PenggajianController/store';
$route['admin/penggajian/edit/(:any)']                      = 'Admin/PenggajianController/edit/$1';
$route['admin/penggajian/update']                           = 'Admin/PenggajianController/update';
$route['admin/penggajian/delete/(:any)']                    = 'Admin/PenggajianController/delete/$1';
$route['admin/penggajian/download/(:any)']                    = 'Admin/PenggajianController/download/$1';

$route['admin/report/absensi']                              = 'Admin/ReportController';
$route['admin/gaji_kotor']                                  = 'Admin/ReportController/gaji_kotor';
$route['admin/gaji_bersih']                                 = 'Admin/ReportController/gaji_bersih';
$route['admin/print/absensi']                               = 'Admin/ReportController/print_absensi';
$route['admin/print/gaji_kotor']                            = 'Admin/ReportController/print_gaji_kotor';
$route['admin/print/gaji_bersih']                           = 'Admin/ReportController/print_gaji_bersih';

$route['admin/setting/absensi']                             = 'Admin/SettingController/absensi';
$route['admin/setting/absensi/update']                      = 'Admin/SettingController/absensi_update';
$route['admin/setting/ketenagakerjaan']                     = 'Admin/SettingController/ketenagakerjaan';
$route['admin/setting/ketenagakerjaan/update']              = 'Admin/SettingController/ketenagakerjaan_update';
$route['admin/setting/kesehatan']                           = 'Admin/SettingController/kesehatan';
$route['admin/setting/kesehatan/update']                    = 'Admin/SettingController/kesehatan_update';
$route['admin/setting']                                     = 'Admin/SettingController';
$route['admin/setting/create']                              = 'Admin/SettingController/create';
$route['admin/setting/store']                               = 'Admin/SettingController/store';
$route['admin/setting/edit/(:any)']                         = 'Admin/SettingController/edit/$1';
$route['admin/setting/update']                              = 'Admin/SettingController/update';
$route['admin/setting/delete/(:any)']                       = 'Admin/SettingController/delete/$1';

$route['admin/bpjs/ketenagakerjaan']                        = 'Admin/BPJSController/ketenagakerjaan_index';
$route['admin/bpjs/ketenagakerjaan/create']                 = 'Admin/BPJSController/ketenagakerjaan_create';
$route['admin/bpjs/ketenagakerjaan/store']                  = 'Admin/BPJSController/ketenagakerjaan_store';
$route['admin/bpjs/ketenagakerjaan/edit/(:any)']            = 'Admin/BPJSController/ketenagakerjaan_edit/$1';
$route['admin/bpjs/ketenagakerjaan/update']                 = 'Admin/BPJSController/ketenagakerjaan_update';
$route['admin/bpjs/ketenagakerjaan/delete/(:any)']          = 'Admin/BPJSController/ketenagakerjaan_delete/$1';
$route['admin/bpjs']                                        = 'Admin/BPJSController';
$route['admin/bpjs/create']                                 = 'Admin/BPJSController/create';
$route['admin/bpjs/store']                                  = 'Admin/BPJSController/store';
$route['admin/bpjs/edit/(:any)']                            = 'Admin/BPJSController/edit/$1';
$route['admin/bpjs/update']                                 = 'Admin/BPJSController/update';
$route['admin/bpjs/delete/(:any)']                          = 'Admin/BPJSController/delete/$1';

$route['profile/edit']                                      = 'ProfileController/edit';
$route['profile/update']                                    = 'ProfileController/update';
$route['profile/changepassword']                            = 'ProfileController/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
