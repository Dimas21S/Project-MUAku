<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'alamat',
        'longitude',
        'latitude',
    ];

    // relasi dengan model MakeUpArtist
    public function makeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class);
    }
}
