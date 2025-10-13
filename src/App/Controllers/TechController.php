<?php

namespace App\Controllers;
use Core\Router;
use Core\Lang;

class TechController
{
    public function index()
    {
        // Données à injecter dans la vue
        $lang = Lang::get();
        $content = [];
        $data =  ["lang" => $lang, "content" => $content];

        // Rendu de la vue (selon ta méthode)
        return view('pages/tech', $data);
    }
}