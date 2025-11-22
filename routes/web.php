<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::post('/', function (Request $request) {
    $request->validate([
        'email' => ['required', 'string', 'email'],
        'password' => ['required', 'string']
    ]);

    dd($request);
})->name('form');
