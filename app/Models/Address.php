<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'kota',
        'kelurahan',
        'link_map',
    ];

    // relasi dengan model MakeUpArtist
    public function makeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class);
    }

    // relasi dengan mode Verification
    public function verification()
    {
        return $this->belongsTo(Verification::class);
    }
}
