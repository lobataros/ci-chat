<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['auth/regis']                   = 'login/regis';
$route['auth/login']                   = 'login/login';
$route['auth/logout']                  = 'login/logout';
$route['chat']                         = 'login/chat';
$route['chat/open']                    = 'chat/open';
$route['chat/maintenance']             = 'chat/maintenance';
$route['chat/kirim']                   = 'chat/kirim';
$route['chat/pending']                 = 'chat/pending';
$route['register']                     = 'login/register';
$route['chat/pending/aktif/(:any)']    = 'login/aktif/$1';
$route['chat/pending/nonaktif/(:any)'] = 'login/nonaktif/$1';
$route['chat/pending/hapus/(:any)']    = 'login/hapus/$1';
$route['register']                     = 'login/register';


$route['default_controller']   = 'login';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
