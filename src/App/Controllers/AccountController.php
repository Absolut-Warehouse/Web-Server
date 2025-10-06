<?php

namespace App\Controllers;

class AccountController
{
    public function signin() {
        $lang = include __DIR__ . "/../../lang/fr.php";
        return view('pages/signin', $lang);
    }

    public function signup() {
        $lang = include __DIR__ . "/../../lang/fr.php";
        return view('pages/signup', $lang);
    }

    public function home(){

    }



}