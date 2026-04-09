<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/artwork/{id}', function ($id) {
    return view('artwork', ['id' => $id]);
})->name('artwork');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/joao-cagarro', function () {
    return view('joao-cagarro');
})->name('joao-cagarro');