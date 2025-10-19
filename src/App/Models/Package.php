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
        return $itemModel->find($this->attributes['item_id']);
    }

    public function order(): ?array
    {
        $item = $this->item();
        if (!$item) return null;

        $orderModel = new \App\Models\Order();
        // Récupérer l'ordre dont la source ou destination correspond à l'adresse liée à l'item
        $order = $orderModel->query()
            ->where('source_address_id', $item['storage_space_id'])
            ->orWhere('destination_address_id', $item['storage_space_id'])
            ->first();

        return $order ?: null;
    }
}
