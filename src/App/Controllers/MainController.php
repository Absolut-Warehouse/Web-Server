<?php

namespace App\Controllers;

use Core\Lang;

class MainController
{
    public function index()
    {
        // Données à injecter dans la vue
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];

        // Rendu de la vue (selon ta méthode)
        return view('pages/home', $data);
    }

    public function faq() {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/FAQ', $data);
    }


    public function team() {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/team', $data);
    }

    public function mission() {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/mission', $data);
    }

    public function contact() {
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];
        return view('pages/contact', $data);
    }

}