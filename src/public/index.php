<?php

require_once '../vendor/autoload.php';

//require_once '../app/L13/index.php';
//require_once '../app/L14/index.php';
//require_once '../app/L15/index.php';
//require_once '../app/L16/index.php';

use App\Router;
use App\Controllers\Home;

$router = new Router();
$router->get('/home', [Home::class, 'index'])
       ->get('/home/create', [Home::class, 'create'])
       ->post('/home/create', [Home::class, 'store']);

// $router->register('/invoice', function(){
//     echo 'Invoice';
// });

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']) );