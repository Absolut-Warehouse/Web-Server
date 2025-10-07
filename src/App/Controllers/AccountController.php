<?php

namespace App\Controllers;

use Core\Lang;

class AccountController
{
    public function signin() {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/signin', $data);
    }

    public function signup() {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/signup', $data);
    }

    public function home(){

    }



}