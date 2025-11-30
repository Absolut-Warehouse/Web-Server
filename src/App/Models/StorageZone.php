<?php

namespace App\Models;

use Core\Model;

class StorageZone extends Model
{
    protected string $table = "storage_zone";
    protected string $primaryKey = "zone_id";

    protected array $fillable = [
        "zone_name",
        "zone_size",
        "zone_refrigerated"
    ];

    /**
     * Retourne tous les espaces de stockage associés à la zone
     */
    public function spaces(): array
    {
        return (new StorageSpace())
            ->query()
            ->where("zone_name", $this->zone_name)
            ->get();
    }

    /**
     * Liste les équipements présents dans cette zone
     */
    public function equipments(): array
    {
        return (new Equipment())
            ->query()
            ->where("zone_id", $this->zone_id)
            ->get();
    }

    /**
     * Liste les terminaux situés dans cette zone
     */
    public function terminals(): array
    {
        return (new Terminal())
            ->query()
            ->where("zone_id", $this->zone_id)
            ->get();
    }

    /**
     * Retourne tous les items actuellement stockés dans cette zone
     */
    public function items(): array
    {
        return (new Item())
            ->query()
            ->select("item.*, storage_space.zone_name")
            ->join("storage_space", "storage_space.space_code", "=", "item.space_code")
            ->where("storage_space.zone_name", $this->zone_name)
            ->get();
    }

    /**
     * Retourne tous les colis (packages) dans cette zone
     */
    public function packages(): array
    {
        return (new Package())
            ->query()
            ->select("package.*, item.*, storage_space.zone_name")
            ->join("item", "item.item_id", "=", "package.item_id")
            ->join("storage_space", "storage_space.space_code", "=", "item.space_code")
            ->where("storage_space.zone_name", $this->zone_name)
            ->get();
    }

    /**
     * Vérifie si la zone a du stockage réfrigéré
     */
    public function isRefrigerated(): bool
    {
        return (bool)$this->zone_refrigerated;
    }
}
