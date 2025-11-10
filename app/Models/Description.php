<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    //
    protected $fillable = [
        'make_up_artist_id',
        'description',
        'description_tambahan',
    ]; 

    public function makeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class, 'make_up_artist_id');
    }
}
