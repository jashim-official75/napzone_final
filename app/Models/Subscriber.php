<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'phone_num',
        'otp_verified',
        'token'
    ];

    public function details()
    {
        return $this->hasMany(SubscriberDetail::class)->orderBy('created_at', 'DESC');
    }

    public function gamePlayed()
    {
        return $this->hasMany(GamePlay::class);
    }
}
