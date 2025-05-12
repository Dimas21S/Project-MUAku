<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'package_id',
        'package_name',
        'amount',
        'status', // pending, success, failed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function makeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class);
    }
}
