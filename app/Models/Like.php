<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $fillable = [
        'user_id',
        'make_up_artist_id',
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
