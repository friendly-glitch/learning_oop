<?php

namespace App\L15;

class Home
{
    public function index(){
        echo 'Home';
    }
    public function create(){
        return '
        <form action="/home/create"  method="POST">
            <lable for= "amount">Amount</label>
            <input type="text" id="amount" name="amount">
        </form>';
    }
    public function store(){
        return $_POST['amount'];
    }
}