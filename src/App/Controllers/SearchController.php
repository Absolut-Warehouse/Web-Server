<?php

namespace App\Controllers;

use App\Models\Address;
use App\Models\Item;
use App\Models\Order;
use Core\Auth;
use Core\Lang;
use App\Models\Package;

class SearchController
{
    public function search()
    {
        $trackingCode = trim($_GET['order'] ?? '');

        if (!$trackingCode) {
            redirect('/'); // aucun code fourni
            exit();
        }

        $packageModel = new Package();
        $package = $packageModel->query()
            ->where('package_code', $trackingCode)
            ->first();

        if (!$package) {
            $lang = Lang::get();
            $content = [
                "error_code" => 404,
                "message" => "Numéro de commande invalide."
            ];
            $data = [
                "lang" => $lang,
                "content" => $content,
                "page_title" => $lang['search']['title'] ?? 'Rechercher'
            ];
            return view("errors/error", $data);
        }

        $packageInstance = new Package();
        $packageInstance->attributes = $package;
        $item = $packageInstance->item();

        $content = [
            'package_code' => $package['package_code'],
            'refrigerated' => $package['package_refrigerated'] ? 'Oui' : 'Non',
            'fragile' => $package['package_fragile'] ? 'Oui' : 'Non',
            'weight' => $item['item_weight'] . ' kg',
            'storage_space' => $item['space_code'] ?? 'Non attribué',
            'arrived_at' => $item['item_entry_time'] ?? 'En attente',
            'departed_at' => $item['item_exit_time'] ?? 'En attente',
            'estimated_delivery' => $item['item_estimated_delivery'] ?? 'Non disponible',
            'status' => $item['item_status'] ?? 'En attente',
        ];

        $lang = Lang::get();
        $data = [
            "lang" => $lang,
            "content" => $content,
            "package" => $package,
            "page_title" => $lang['search']['title'] ?? 'Rechercher'
        ];

        return view('pages/search', $data);
    }

    public function orders(): false|string
    {
        $user = Auth::user();

        $address = (new Address())
            ->query()
            ->where('user_email', $user['email'])
            ->first();

        $packages = [];

        if ($address) {
            $addressId = $address['address_id'];
            $orders = (new Order())
                ->query()
                ->where('source_address_id', $addressId)
                ->orWhere('destination_address_id', $addressId)
                ->get();

            foreach ($orders as $order) {
                $items = (new Item())
                    ->query()
                    ->where('item_id', $order['order_id'])
                    ->get();

                foreach ($items as $item) {
                    $pkg = (new Package())
                        ->query()
                        ->where('item_id', $item['item_id'])
                        ->first();

                    if ($pkg) {
                        $packages[] = [
                            'order_id' => $order['order_id'],
                            'package_code' => $pkg['package_code'],
                            'refrigerated' => $pkg['package_refrigerated'],
                            'fragile' => $pkg['package_fragile'],
                            'weight' => $item['item_weight'],
                            'status' => $item['item_status'],
                            'entry_time' => $item['item_entry_time'],
                            'exit_time' => $item['item_exit_time'],
                            'estimated_delivery' => $item['item_estimated_delivery'],
                        ];
                    }
                }
            }
        }

        $lang = Lang::get();
        $data = [
            'lang' => $lang,
            'user' => $user,
            'packages' => $packages,
            'page_title' => $lang['orders']['title'] ?? 'Mes colis'
        ];

        return view('pages/orders', $data);
    }
}
