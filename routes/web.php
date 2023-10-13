<?php

use App\Livewire\HomePage;
use App\Livewire\ItemsPage;
use App\Livewire\LoginPage;
use App\Http\Livewire\Posts;
use App\Livewire\SearchPage;
use App\Livewire\RegisterPage;
use App\Livewire\CategoriesPage;
use App\Livewire\SubCategoriesPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Livewire\Tags;

Route::get('/', HomePage::class)->name("home");
Route::get('/categories', CategoriesPage::class)->name('categories');
Route::get('/categories/{category}/subcategories', SubCategoriesPage::class)->name('subcategories');
Route::get("/items", ItemsPage::class)->name("items");
Route::get('/search/items/{keyword}', SearchPage::class)->name("search");

// auth 
Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');

Route::get("/blog", Posts::class)->name("blogs");
Route::get("/blog/{type}/{slug}", Tags::class)->name("tags");
Route::get("locale/{locale}", LocalizationController::class)->name("locale");
