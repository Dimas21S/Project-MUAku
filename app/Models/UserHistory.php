<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
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
    public function makeupartist()
    {
        return $this->belongsTo(MakeUpArtist::class, 'make_up_artist_id');
    }
}
