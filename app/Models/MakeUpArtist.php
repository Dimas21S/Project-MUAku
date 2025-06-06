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
        'link_map',
        'description',
        'category',
        'file_certificate',
        'profile_photo',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function messages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'make_up_artist_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'make_up_artist_id');
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
}
