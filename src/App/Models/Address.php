<?php
namespace App\Models;

use Core\Model;

class Address extends Model
{
    protected string $table = 'address';
    protected string $primaryKey = 'address_id';
    protected array $fillable = [
        'complementary',
        'country',
        'postal_code',
        'city',
        'street',
        'street_number',
        'user_email'
    ];

    public function user(): ?array
    {
        $userModel = new \App\Models\User();
        return $userModel->query()->where('user_id', $this->attributes['user_id'] ?? 0)->first();
    }

    public function orders(): array
    {
        $orderModel = new \App\Models\Order();
        return $orderModel->query()
            ->where('source_address_id', $this->attributes['address_id'])
            ->orWhere('destination_address_id', $this->attributes['address_id'])
            ->get();
    }

    public function ordersSource(): array
    {
        $orderModel = new \App\Models\Order();
        return $orderModel->query()
            ->where('source_address_id', $this->attributes['address_id'])
            ->get();
    }

    public function ordersDestination(): array
    {
        $orderModel = new \App\Models\Order();
        return $orderModel->query()
            ->where('destination_address_id', $this->attributes['address_id'])
            ->get();
    }

}
