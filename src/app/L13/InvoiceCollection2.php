<?php
//Реализация через готовый итератор
namespace App\L13;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class InvoiceCollection2 implements IteratorAggregate
{
    private array $invoices;

    public function __construct(array $invoices) {
        $this->invoices = $invoices;
    }

    public function getIterator(): Traversable{
        return new ArrayIterator($this->invoices);
    }
}