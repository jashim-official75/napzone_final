<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteGame extends Model
{
    use HasFactory;

    public function Game()
    {
        return $this->belongsTo(Game::class);
    }
}
