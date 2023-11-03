<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function gameCategories()
    {
        return $this->hasMany(GameCategory::class);
    }

    public function Subscriber()
    {
        return $this->hasMany(Subscriber::class);
    }
    public function FavoriteGame()
    {
        return $this->hasMany(FavoriteGame::class);
    }
}
