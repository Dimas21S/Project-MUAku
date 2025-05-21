<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class MakeUpArtist extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'name',
        'password',
        'email',
        'phone',
        'address',
        'city',
        'category',
        'file_certificate',
        'profile_photo',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
