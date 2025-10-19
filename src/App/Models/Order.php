<?php
namespace App\Models;

use Core\Model;

class Order extends Model
{
    protected string $table = 'order';
    protected string $primaryKey = 'order_id';
    protected array $fillable = [
        'order_priority',
        'source_address_id',
        'destination_address_id'
    ];

    public function sourceAddress(): ?array
    {
        $addressModel = new \App\Models\Address();
        return $addressModel->find($this->attributes['source_address_id'] ?? 0);
    }

    public function destinationAddress(): ?array
    {
        $addressModel = new \App\Models\Address();
        return $addressModel->find($this->attributes['destination_address_id'] ?? 0);
    }

}
