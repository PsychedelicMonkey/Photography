<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $posts = Post::query()
        ->with(['author', 'category'])
        ->limit(15)
        ->get();

    return Inertia::render('Home', compact('posts'));
})->name('home');

Route::get('/post/{post:slug}', function (Post $post) {
    $post->load(['author', 'category', 'tags']);

    return Inertia::render('Post', compact('post'));
})->name('post.show');
