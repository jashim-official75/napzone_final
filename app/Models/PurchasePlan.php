<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'subscriber_id',
        'service_type',
        'autorenew',
        'renewed',
        'confirmed_by_user',
        'start_at',
        'end_at',
        'refid',
    ];

    public function planName()
    {
        return $this->hasOne(Plan::class, 'id', 'plan_id');
    }

    public function subscriber()
    {
        return $this->hasOne(Subscriber::class, 'id', 'subscriber_id');
    }
}
