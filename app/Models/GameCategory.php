<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'category_id',
    ];

    public function categoryName()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function gameName()
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }
}
