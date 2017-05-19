<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['auth/login']  = 'login/login';
$route['auth/logout'] = 'login/logout';
$route['chat']        = 'login/chat';
$route['kirim']       = 'chat/kirim';

$route['default_controller']   = 'login';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;
