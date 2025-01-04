<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');


Route::get('/send-notification', [PostController::class, 'index'])->name('posts.index');

Route::get('/receive-notification', function () {
    return view('receive-notification');
});
