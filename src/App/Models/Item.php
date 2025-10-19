<?php
namespace App\Models;

use Core\Model;

class Item extends Model
{
    protected string $table = 'item';
    protected string $primaryKey = 'item_id';
    protected array $fillable = [
        'item_weight',
        'item_status',
        'item_estimated_delivery',
        'item_entry_time',
        'item_exit_time',
        'storage_space_id'
    ];

    public function package(): ?array
    {
        $packageModel = new \App\Models\Package();
        return $packageModel->query()->where('item_id', $this->item_id)->first();
    }
}
