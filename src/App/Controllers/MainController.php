<?php

namespace App\Controllers;

class MainController
{
    public function index()
    {
        // Données à injecter dans la vue
        $lang = include __DIR__ . "/../../lang/fr.php";

        // Rendu de la vue (selon ta méthode)
        return view('pages/home', $lang);
    }

    public function faq() {
        $lang = include __DIR__ . "/../../lang/fr.php";
        return view('pages/FAQ', $lang);
    }


    public function team() {
        $lang = include __DIR__ . "/../../lang/fr.php";
        return view('pages/team', $lang);
    }

    public function mission() {
        $lang = include __DIR__ . "/../../lang/fr.php";
        return view('pages/mission', $lang);
    }

    public function contact() {
        $lang = include __DIR__ . "/../../lang/fr.php";
        return view('pages/contact', $lang);
    }

}