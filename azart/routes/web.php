<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/artwork/{art_id}', function ($art_id) {
    return view('artwork', ['art_id' => $art_id]);
})->name('artwork');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/joao-cagarro', function () {
    return view('joao-cagarro');
})->name('joao-cagarro');

Route::get('/joao-cagarro-pt', function () {
    return view('joao-cagarro-pt');
})->name('joao-cagarro.pt');