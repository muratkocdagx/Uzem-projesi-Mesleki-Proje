<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'My_index';
$route['404_override'] = 'My_index/Kolpa';
$route['translate_uri_dashes'] = FALSE;


/*sayfa admin yönlendirmeler*/

$route['login'] = 'back/Login';

$route['logout'] = 'back/logout';

$route['home'] = 'back/Home';


/*sayfa admin yönlendirmeler*/

/*sayfa front yönlendirmeler*/
$route['index'] = 'My_index';

$route['notes'] = 'back/notes/Home';

$route['lessons-view'] = 'back/lessons-view/Home';

$route['announcement'] = 'back/announcement/Home';

$route['profile'] = 'back/profile/Home';

$route['events'] = 'back/events/Home';
$route['events-details/(:any)'] = 'back/events/Home/detail/$1';

$route['user'] = 'back/user/Home';
$route['user/insert'] = 'back/user/Home/insert';
$route['user/inserting'] = 'back/user/Home/inserting';
$route['user/editing'] = 'back/user/Home/editing';
$route['user/edit/(:any)'] = 'back/user/Home/edit/$1';
$route['user/delete/(:any)'] = 'back/user/Home/delete/$1';



$route['department'] = 'back/department/Home';
$route['department/insert'] = 'back/department/Home/insert';
$route['department/inserting'] = 'back/department/Home/inserting';
$route['department/editing'] = 'back/department/Home/editing';
$route['department/edit/(:any)'] = 'back/department/Home/edit/$1';
$route['department/delete/(:any)'] = 'back/department/Home/delete/$1';



$route['lessons'] = 'back/lessons/Home';
$route['lessons/insert'] = 'back/lessons/Home/insert';
$route['lessons/inserting'] = 'back/lessons/Home/inserting';
$route['lessons/editing'] = 'back/lessons/Home/editing';
$route['lessons/edit/(:any)'] = 'back/lessons/Home/edit/$1';
$route['lessons/delete/(:any)'] = 'back/lessons/Home/delete/$1';



$route['add-note'] = 'back/add-note/Home';
$route['add-note/insert'] = 'back/add-note/Home/insert';
$route['add-note/inserting'] = 'back/add-note/Home/inserting';
$route['add-note/editing'] = 'back/add-note/Home/editing';
$route['add-note/edit/(:any)'] = 'back/add-note/Home/edit/$1';
$route['add-note/delete/(:any)'] = 'back/add-note/Home/delete/$1';



$route['add-announcement'] = 'back/add-announcement/Home';
$route['add-announcement/insert'] = 'back/add-announcement/Home/insert';
$route['add-announcement/inserting'] = 'back/add-announcement/Home/inserting';
$route['add-announcement/editing'] = 'back/add-announcement/Home/editing';
$route['add-announcement/edit/(:any)'] = 'back/add-announcement/Home/edit/$1';
$route['add-announcement/delete/(:any)'] = 'back/add-announcement/Home/delete/$1';

$route['add-events'] = 'back/add-events/Home';
$route['add-events/insert'] = 'back/add-events/Home/insert';
$route['add-events/inserting'] = 'back/add-events/Home/inserting';
$route['add-events/editing'] = 'back/add-events/Home/editing';
$route['add-events/edit/(:any)'] = 'back/add-events/Home/edit/$1';
$route['add-events/delete/(:any)'] = 'back/add-events/Home/delete/$1';


$route['mail'] = 'back/mail/Home';
$route['mail/send'] = 'back/mail/Home/send';
$route['mail/sending'] = 'back/mail/Home/sending';
$route['mail/sending/inserting'] = 'back/mail/Home/inserting';
$route['mail/reply/(:any)'] = 'back/mail/Home/reply/$1';
$route['mail/detail/(:any)'] = 'back/mail/Home/detail/$1';
$route['mail/delete/(:any)'] = 'back/mail/Home/delete/$1';
$route['mail/direct-send'] = 'back/mail/Home/direct';







/*sayfa front yönlendirmeler*/




/* panel giriş input yönlendirme */  /* -----> */  $route['control_panel_user'] = 'back/Login/login_config';

