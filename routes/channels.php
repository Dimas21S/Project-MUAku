<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{makeupArtistId}.{customerId}', function ($user, $makeupArtistId, $customerId) {
    return true; // kamu bisa ganti validasi user di sini
});

