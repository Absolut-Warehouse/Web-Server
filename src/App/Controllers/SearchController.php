<?php

namespace App\Controllers;

use Core\Lang;

class SearchController
{
    public function search() {

        $orderId = htmlspecialchars($_GET['order'] ?? '');

        if (filter_var($orderId, FILTER_VALIDATE_INT) === false || strlen($orderId)==0 ) {
            // Valeur invalide, renvoyer une erreur ou rediriger
            $lang = Lang::get();
            $content = ["error_code" => 404, "message" => "Numéro de commande invalide."];
            $data =  ["lang" => $lang, "content" => $content];
            return view("errors/error", $data);
        }

        //Faire les appels DB pour les informations
        $commande = [
            'order' => [
                'id' => $orderId,
                'arrived_at' => $_GET['arrived_at'] ?? null,
                'departed_at' => $_GET['departed_at'] ?? null,
                'estimated_delivery' => $_GET['estimated_delivery'] ?? null,
                'status' => $_GET['status'] ?? null,
            ],
        ];

        if ($orderId) {
            // Par exemple : chercher la commande en base
            // $order = $this->orderModel->findById($orderId);
            $lang = Lang::get();
            $data =  ["lang" => $lang, "content" => $commande];
            return view('pages/search', ["lang" => $lang, "data" => $data]);
        }
        else {
            redirect('/');
            exit();
        }

    }
}