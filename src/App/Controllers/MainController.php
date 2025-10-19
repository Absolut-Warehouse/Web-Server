<?php

namespace App\Controllers;

use Core\Lang;

class MainController
{
    public function index()
    {
        $lang = Lang::get();
        $data = [
            "lang" => $lang,
            "page_title" => $lang['home']['title'] ?? 'Accueil',
            "content" => []
        ];
        return view('pages/home', $data);
    }

    public function faq()
    {
        $lang = Lang::get();
        $data = [
            "lang" => $lang,
            "page_title" => $lang['FAQ']['title'] ?? 'FAQ',
            "content" => []
        ];
        return view('pages/FAQ', $data);
    }

    public function team()
    {
        $lang = Lang::get();
        $data = [
            "lang" => $lang,
            "page_title" => $lang['team']['title'] ?? 'Equipe',
            "content" => []
        ];
        return view('pages/team', $data);
    }

    public function mission()
    {
        $lang = Lang::get();
        $data = [
            "lang" => $lang,
            "page_title" => $lang['mission']['title'] ?? 'Objectif',
            "content" => []
        ];
        return view('pages/mission', $data);
    }

    public function contact()
    {
        $lang = Lang::get();
        $data = [
            "lang" => $lang,
            "page_title" => $lang['contact']['title'] ?? 'Contact',
            "content" => []
        ];
        return view('pages/contact', $data);
    }
}
