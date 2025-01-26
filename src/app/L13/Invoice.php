<?php

namespace App\L13;

use Iterator;
use Traversable;

class Invoice{
    public int $amount;
    protected int $amount2 = 1111;

    public function __construct()
    {
        $this->amount = rand(1,9999);
    }
}