<?php
namespace App\Models;

use Core\Model;

class Employee extends Model
{
    protected string $table = 'employee';
    protected string $primaryKey = 'employee_id';
    protected array $fillable = [
        'position',
        'hire_date',
        'user_id'
    ];

    /**
     * Renvoi le tableau associatif de l'employée associé à un utilisateur
     * @return array|null
     */
    public function user(): ?array
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
