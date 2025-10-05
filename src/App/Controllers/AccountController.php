<?php

namespace App\Controllers;

class AccountController
{
    public function signin() {
        return view('pages/signin');
    }

    public function signup() {
        return view('pages/signup');
    }

    public function home(){

    }



}