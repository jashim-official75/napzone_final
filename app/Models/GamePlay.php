<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GamePlay extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_id',
        'game_id',
    ];
    public function gameDetails()
    {
        return $this->hasMany(Game::class, 'id', 'game_id');
    }

    public function subscriberDetails()
    {
        return $this->hasMany(Subscriber::class, 'id', 'subscriber_id');
    }
}
