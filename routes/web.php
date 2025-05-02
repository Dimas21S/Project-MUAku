<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('landing-page');
});

Route::get('/login', function () {
    $hello = 'hello';
    return view('landing-page', compact('hello'));
});
