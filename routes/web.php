<?php

use App\Http\Livewire\Page;
use App\Http\Livewire\Post;
use App\Http\Livewire\Posts;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use App\Livewire\SubCategoriesPage;
use Filament\Pages\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name("home");
Route::get('/categories', CategoriesPage::class)->name('categories');
Route::get('/categories/{category}/subcategories', SubCategoriesPage::class)->name('subcategories');
Route::get('/login', Login::class)->name('login');

/*
Route::get("categories/{slug}");
Route::get("categories/{slug}/subcategories");
Route::get("categories/{slug}/items");
Route::get("items/{slug}"); */

Route::get("/blog", Posts::class)->name("blogs");
// Route::get("/blog/post/{slug}", Post::class)->name("post");
// Route::get("/{slug}", Page::class)->name("page");
