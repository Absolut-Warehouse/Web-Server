<?php

namespace App\Controllers;

class MainController
{
    public function show()
    {
        return view('home', ['name' => 'John Doe']);
    }

    public function index()
    {
        return view('home', ["title" => "My tittle"]);
    }
}