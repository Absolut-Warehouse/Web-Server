<?php

namespace App\Controllers;

class MainController
{
    public function index()
    {
        // Données à injecter dans la vue
        $data = [
            'title' => 'Orange Box — Accueil',
            'companyName' => 'Orange Box',
            'tagline' => 'Vos commandes, livrées vite et bien.',
            'services' => [
                ['title' => 'Repas', 'desc' => 'Livraison de restaurants locaux en moins de 30 min.'],
                ['title' => 'Courses', 'desc' => 'Courses hebdomadaires livrées à domicile.'],
                ['title' => 'Colis', 'desc' => 'Envoi et réception de colis partout en ville.'],
            ],
        ];

        // Rendu de la vue (selon ta méthode)
        return view('pages/home', $data);
    }

    public function envoyerCommande()
    {
        // Simple traitement (exemple de POST)
        $name = trim($_POST['name'] ?? '');
        $item = trim($_POST['item'] ?? '');

        $data = [
            'title' => 'Commande — LivraRapide',
            'companyName' => 'LivraRapide',
            'tagline' => 'Vos commandes, livrées vite et bien.',
            'services' => [
                ['title' => 'Repas', 'desc' => 'Livraison de restaurants locaux en moins de 30 min.'],
                ['title' => 'Courses', 'desc' => 'Courses hebdomadaires livrées à domicile.'],
                ['title' => 'Colis', 'desc' => 'Envoi et réception de colis partout en ville.'],
            ],
        ];

        if ($name && $item) {
            // Ici tu pourrais sauvegarder ou envoyer un mail
            $data['success'] = "Merci $name — votre commande \"$item\" a bien été enregistrée.";
        } else {
            $data['success'] = "Veuillez remplir tous les champs.";
            $data['old'] = ['name' => $name, 'item' => $item];
        }

        return view('home', $data);
    }

    public function faq() {
        return view('pages/FAQ');
    }


    public function team() {
        return view('pages/team');
    }

    public function mission() {
        return view('pages/mission');
    }

    public function contact() {
        return view('pages/contact');
    }

}