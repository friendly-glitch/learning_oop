<?php

namespace App\L14\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found';
}