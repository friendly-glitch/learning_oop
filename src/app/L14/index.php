<?php

//Суперглобальная переменная $_SERVER и создание базового роутера

//$_SERVER
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';

use App\L14\Router;
use App\L14\Home;

$router = new Router();
$router->register('/home', [Home::class, 'index'])
       ->register('/home/create', [Home::class, 'create']);

$router->register('/invoice', function(){
    echo 'Invoice';
});

$router->resolve($_SERVER['REQUEST_URI']);