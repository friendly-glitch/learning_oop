<?php

namespace App\L14;

use App\L14\Exceptions\RouteNotFoundException;

class Router
{
    private array $routes;

    public function register(string $uri,callable|array $action) : self{
        $uri = explode('?', $uri)[0];

        $this->routes[$uri] = $action;

        return $this;
    }

    public function resolve($uri){
        $uri = explode('?', $uri)[0];

        $action = $this->routes[$uri] ?? null;

        if(! $action){
            throw new RouteNotFoundException();
        }

        if(is_callable($action)){
            return call_user_func($action);
        }

        if(is_array($action)){
            [$class, $method] = $action;
            $obj = new $class();
            call_user_func_array([$obj, $method], []);
        }
    }
}