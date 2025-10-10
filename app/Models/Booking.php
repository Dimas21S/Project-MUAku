<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'id_user',
        'id_mua',
        'package_id',
        'kode_pembayaran',
        'amount',
        'biaya_admin',
        'status'
    ];
}
