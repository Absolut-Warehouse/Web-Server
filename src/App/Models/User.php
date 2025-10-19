<?php
namespace App\Models;

use Core\Model;

class User extends Model
{
    protected string $table = 'user';
    protected string $primaryKey = 'user_id';
    protected array $fillable = ["user_nom", "user_prenom", "password", "email", "user_phone_number", "sexe"];

    public function address(): ?array
    {
        return (new Address())->where('user_id', $this->id)->first();
    }

    public function packagesSent(): array
    {
        return (new Package())->where('sender_id', $this->id)->get();
    }

    public function packagesReceived(): array
    {
        return (new Package())->where('recipient_id', $this->id)->get();
    }

}