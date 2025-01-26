<?php

namespace App\L13;

class InvoiceCollection implements \Iterator
{
    private array $invoices;

    public function __construct(array $invoices) {
        $this->invoices = $invoices;
    }
    public function current(): mixed{
        return current($this->invoices);
    }
    public function next(): void{
        next($this->invoices);
    }
    public function key(): mixed{
        return key($this->invoices);
    }
    public function valid(): bool{
        return current($this->invoices) !== false;
    }
    public function rewind(): void{
        reset($this->invoices);
    }
}