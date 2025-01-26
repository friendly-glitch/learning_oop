<?php

//Суперглобальные переменные $_GET, $_POST и $_REQUEST
//$_GET - Ассоциативный массив переменных, переданных скрипту через параметры URL (известные также как строка запроса). Обратите внимание, что массив не только заполняется для GET-запросов, а скорее для всех запросов со строкой запроса.
//$_POST - Ассоциативный массив данных, переданных скрипту через HTTP методом POST при использовании application/x-www-form-urlencoded или multipart/form-data в заголовке Content-Type запроса HTTP.
//$_REQUEST- Ассоциативный массив (array), который по умолчанию содержит данные переменных $_GET, $_POST и $_COOKIE.


//Сейчас доработаем класс Router, чтобы регистрировать маршруты для get и post запросов

use App\L15\Router;
use App\L15\Home;

$router = new Router();
$router->get('/home', [Home::class, 'index'])
       ->get('/home/create', [Home::class, 'create'])
       ->post('/home/create', [Home::class, 'store']);

// $router->register('/invoice', function(){
//     echo 'Invoice';
// });

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']) );