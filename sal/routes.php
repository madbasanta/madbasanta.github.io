<?php
/************************
 * basic routes of site *
 ************************/
$router->get('', 'index.php');
$router->get('about', 'about.php');
$router->get('contact', 'contact.php');
$router->get('forum', 'forum/forum.php');
$router->get('profile', 'profile/profile.php');


/*****************************
 * 	authentication routes  	*
 *****************************/
$router->get('login', 'auth/loginPage.php');
$router->post('login', 'auth/loginUser.php');

$router->get('register', 'auth/registerPage.php');
$router->post('register', 'auth/registerUser.php');

$router->get('logout', 'auth/logout.php');


/*****************************
 * all request form profile *
 *****************************/
$router->post('edit/personal-details', 'profile/edit-personal.php');
$router->post('edit/address', 'profile/edit-address.php');
$router->post('edit/main', 'profile/edit-main.php');


/*****************
* 	newsletter	 *
*****************/
$router->post('newsletter', 'newsletter.php');


/*****************
* forum routes  *
*****************/
$router->post('forum/create', 'forum/create.php');
$router->post('post/create', 'forum/post.create.php');


/*****************
* chat routes  *
*****************/
$router->post('chat/send', 'chat/store.php');
$router->post('chat/load', 'chat/load.php');



/**************************
* make and fetch donation  *
***************************/
$router->post('donation/make', 'donation/make.php');
$router->post('sal/web-service/donations', 'donation/getDonations.php');

