<?php
namespace App\Models;

use Core\Model;

class Package extends Model
{
    protected string $table = 'package';
    protected string $primaryKey = 'package_id';
    public array $attributes = [];
    protected array $fillable = [
        'package_code',
        'package_refrigerated',
        'package_fragile',
        'item_id'
    ];

    public function item(): ?array
    {
        if (empty($this->attributes['item_id'])) {
            return null;
        }

        $itemModel = new Item();
        // Assurez-vous que la classe Item est bien importée ou existe
        return $itemModel->find($this->attributes['item_id']);
    }

    public function order(): ?array
    {
        $item = $this->item();
        if (!$item) return null;

        $orderModel = new \App\Models\Order();
        // Récupérer l'ordre dont la source ou destination correspond à l'adresse liée à l'item
        // Attention : Cette logique d'association d'ordre par storage_space_id semble incorrecte selon votre schéma.
        // L'ordre est lié à l'item via order_id = item_id (clé forte).
        $order = $orderModel->find($item['item_id']);

        return $order ?: null;
    }

    /**
     * Récupère le nombre total de colis avec les filtres de recherche appliqués
     */
    public function countAll(?string $search = null): int
    {
        // 1. Initialiser la requête AVEC TOUS LES JOINS nécessaires au filtrage
        $query = $this->query()
            ->from("package")
            ->join("item", "package.item_id", "=", "item.item_id")
            // On doit inclure le JOIN sur storage_space car le WHERE l'utilise
            ->join("storage_space", "item.space_code", "=", "storage_space.space_code", "LEFT");

        // 2. Gestion de la Recherche (WHERE)
        if ($search) {
            // NOTE : L'erreur indique que c'est ici que 'storage_space' est utilisé.
            $query->where('package.package_code', 'LIKE', "%$search%")
                ->orWhere('storage_space.space_code', 'LIKE', "%$search%");
        }

        // 3. Appel de la méthode count() corrigée de la classe parente
        // Cette méthode (si corrigée dans Core\Model) utilisera les JOIN et WHERE présents.
        return $query->count();
    }
    /**
     * Récupère les colis avec filtres de recherche, tri, et pagination
     */
    public function getAllWithItemAndSpace(?string $search = null, string $sort = 'item.item_entry_time', string $dir = 'DESC', int $limit = 100, int $offset = 0): array
    {
        // Initialisation de la requête de base
        $query = $this->query()
            ->select([
                'package.package_id',
                'package.package_code',
                'package.package_refrigerated',
                'package.package_fragile',
                'item.item_weight',
                'item.item_status',
                'item.item_entry_time',
                'item.item_exit_time',
                'item.item_estimated_delivery',
                'storage_space.space_code',
                'storage_zone.zone_name',
                'city',
                'postal_code'
            ])
            ->from("package")
            ->join("item", "package.item_id", "=", "item.item_id")
            ->join("storage_space", "item.space_code", "=", "storage_space.space_code", "LEFT")
            ->join("storage_zone", "storage_space.zone_name", "=", "storage_zone.zone_name", "LEFT")
            ->join("order", "item.item_id", "=", "order.order_id", "LEFT")
            ->join("address", "order.destination_address_id", "=", "address.address_id", "LEFT");

        // --- 1. Gestion de la Recherche ---
        if ($search) {
            $query->where('package.package_code', 'LIKE', "%$search%")
                ->orWhere('storage_space.space_code', 'LIKE', "%$search%");
        }

        // --- 2. Gestion du Tri (Sécurisé) ---
        $allowedSorts = [
            'package.package_code',
            'item.item_weight',
            'item.item_status',
            'item.item_entry_time',
            'item.item_estimated_delivery',
            'item.item_exit_time',
            'address.city', // Ajout du tri par ville
        ];

        if (!in_array($sort, $allowedSorts)) {
            $sort = 'item.item_entry_time';
        }
        $dir = strtoupper($dir) === 'ASC' ? 'ASC' : 'DESC';

        $query->orderBy($sort, $dir);

        // --- 3. Gestion de la Pagination ---
        $query->limit($limit)->offset($offset);

        return $query->get();
    }
}