<?php

require_once '../vendor/autoload.php';

define('VIEW_PATH', __DIR__ . "/" . "../views");
//require_once '../app/L13/index.php';
//require_once '../app/L14/index.php';
//require_once '../app/L15/index.php';
//require_once '../app/L16/index.php';

use App\Router;
use App\Controllers\Home;
use App\View;

try{
       $router = new Router();
       $router->get('/home', [Home::class, 'index'])
              ->get('/home/create', [Home::class, 'create'])
              ->post('/home/create', [Home::class, 'store']);
       
       $router->get('/404', function(){
           return View::make('404')->render();
       });
       
       echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']) );
}catch(Throwable $e){
       header('Location: /404');
       exit;
}
