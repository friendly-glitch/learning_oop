<?php

namespace App\L15\Exceptions;

class RouteNotFoundException extends \Exception
{
    protected $message = 'Route not found';
}