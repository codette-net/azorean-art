<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/artwork', function () {
    return view('artwork');
});

Route::get('/contact', function () {
    return view('contact');
});