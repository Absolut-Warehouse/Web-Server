<?php
namespace App\Models;

use Core\Model;

class Container extends Model
{
    protected string $table = 'container';
    protected string $primaryKey = 'container_id';
    protected array $fillable = [
        'volume',
        'description',
        'special_requirement',
        'item_id'
    ];
}
