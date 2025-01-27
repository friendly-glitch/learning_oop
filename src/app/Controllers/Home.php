<?php

namespace App\Controllers;

use App\View;

class Home
{
    public function index(){
        return View::make('index','main', params: ['param' => 'FOOOOO'])->render();
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