<?php

namespace App\Models;

use Core\Model;

class UserActivity extends Model
{
    protected string $table = 'user_activity';
    protected string $primaryKey = 'user_id';
    protected array $fillable = ['user_id',"created_at", "last_login", "last_action", "session_token"];
}