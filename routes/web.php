<?php

use App\Http\Livewire\Posts;
use App\Livewire\CategoriesPage;
use App\Livewire\HomePage;
use App\Livewire\ItemsPage;
use App\Livewire\LoginPage;
use App\Livewire\RegisterPage;
use App\Livewire\SearchPage;
use App\Livewire\SubCategoriesPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name("home");
Route::get('/categories', CategoriesPage::class)->name('categories');
Route::get('/categories/{category}/subcategories', SubCategoriesPage::class)->name('subcategories');
Route::get("/items", ItemsPage::class)->name("items");
Route::get('/search/items/{keyword}', SearchPage::class)->name("search");

// auth 
Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');

/*
Route::get("categories/{slug}");
Route::get("categories/{slug}/subcategories");
Route::get("categories/{slug}/items");
Route::get("items/{slug}"); */

Route::get("/blog", Posts::class)->name("blogs");
// Route::get("/blog/post/{slug}", Post::class)->name("post");
// Route::get("/{slug}", Page::class)->name("page");
