<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['make_up_artist_id', 'price', 'description'];

    public function MakeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class);
    }
}
