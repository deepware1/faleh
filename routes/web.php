<?php

use App\Http\Livewire\Page;
use App\Http\Livewire\Post;
use App\Http\Livewire\Posts;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name("home");

Route::get("/blog", Posts::class)->name("blogs");
Route::get("/blog/post/{slug}", Post::class)->name("post");
Route::get("/{slug}", Page::class)->name("page");
