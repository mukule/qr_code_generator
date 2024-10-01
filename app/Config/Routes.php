<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //Auth Routes
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');
$routes->get('/editStaff/(:num)', 'AuthController::editStaff/$1');
$routes->post('/editStaff/(:num)', 'AuthController::editStaff/$1');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/updateStaffStatus/(:num)', 'AuthController::updateStaffStatus/$1');

//Home routes
$routes->get('/home', 'Home::index');
$routes->get('/staffs', 'Home::staffs');


//qr codes
$routes->get('/generated-qr-codes', 'QrCodeController::index');
$routes->post('/generate-qr-code', 'QrCodeController::generate_qr_code');
$routes->get('/generate-qr-code', 'QrCodeController::generate_qr_code');
$routes->get('qr-codes/edit/(:num)', 'QrCodeController::edit_qr_code/$1');
$routes->post('qr-codes/edit/(:num)', 'QrCodeController::edit_qr_code/$1');
$routes->get('/generated-detailed-qr-codes', 'DetailedQrCodeController::index');
$routes->post('/generate-d-qr-code', 'DetailedQrCodeController::generate_qr_code');
$routes->get('detailed-qr-codes/edit/(:num)', 'DetailedQrCodeController::edit/$1');
$routes->post('detailed-qr-codes/edit/(:num)', 'DetailedQrCodeController::edit/$1');
$routes->get('/generate-d-qr-code', 'DetailedQrCodeController::generate_qr_code');
$routes->get('/version', 'VersionController::version');