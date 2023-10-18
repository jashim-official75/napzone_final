<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriberDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_id',
        'device',
        'ip',
        'platform',
        'browser'
    ];
}
