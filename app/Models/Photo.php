<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $fillable = [
        'make_up_artist_id',
        'image_path',
        'thumbnail_path',
    ];

    public function makeupArtist()
    {
        return $this->belongsTo(MakeUpArtist::class, 'make_up_artist_id');
    }
}
