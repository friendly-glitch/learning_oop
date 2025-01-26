<?php

namespace App\L15;

use App\L15\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    private function register(string $requestMethod,string $uri,callable|array $action) : self{
        $uri = explode('?', $uri)[0];

        $this->routes[$requestMethod][$uri] = $action;

        return $this;
    }
    public function get(string $uri,callable|array $action){
        return $this->register('get', $uri, $action);
    }
    public function post(string $uri,callable|array $action){
        return $this->register('post', $uri, $action);
    }

    public function resolve($uri, $requestMethod){
        $uri = explode('?', $uri)[0];

        $action = $this->routes[$requestMethod][$uri] ?? null;
        if(! $action){
            throw new RouteNotFoundException();
        }

        if(is_callable($action)){
            return call_user_func($action);
        }

        if(is_array($action)){
            [$class, $method] = $action;
            $obj = new $class();
            return call_user_func_array([$obj, $method], []);
        }
        throw new RouteNotFoundException();
    }
}