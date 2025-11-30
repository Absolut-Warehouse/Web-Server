<?php

namespace App\Models;

use Core\Model;

class Terminal extends Model
{
    protected string $table = "terminal";
    protected string $primaryKey = "terminal_id";

    protected array $fillable = [
        "terminal_name",
        "permission_code",
        "zone_id"
    ];

    /**
     * Retourne la zone associée à ce terminal
     */
    public function zone(): ?array
    {
        return (new StorageZone())
            ->query()
            ->where("zone_id", $this->zone_id)
            ->first();
    }

    /**
     * Retourne les employés assignés à ce terminal
     */
    public function employees(): array
    {
        return (new WorksOn())
            ->getEmployeesForTerminal($this->terminal_id);
    }

    /**
     * Retourne l'équipement présent dans la zone de ce terminal
     */
    public function equipments(): array
    {
        return (new Equipment())
            ->query()
            ->where("zone_id", $this->zone_id)
            ->get();
    }
}
