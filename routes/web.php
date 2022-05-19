<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->post('/Newzone-Api/Auth/Login', 'AuthController@postLogin');
$router->post('/Newzone-Api/Auth/Register', 'AuthController@postRegister');
