<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $fillable = [
        'make_up_artist_id',
        'hari',
        'jam_buka',
        'jam_tutup',
    ];

    public function makeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class);
    }
}
