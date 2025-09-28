<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    //
    protected $fillable = [
        'username',
        'name',
        'password',
        'email',
        'phone',
        'link_map',
        'description',
        'category',
        'file_certificate',
        'profile_photo',
    ];

    public function makeUpArtist()
    {
        return $this->belongsTo(MakeUpArtist::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
