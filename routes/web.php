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
use App\Http\Livewire\Page;
use App\Http\Livewire\Tags;
use App\Livewire\CategoriesItemsPage;
use App\Livewire\ContactUsPage;
use App\Livewire\ItemCreatePage;
use App\Livewire\ItemShowPage;
use App\Livewire\UserProfilePage;
use App\Livewire\WeatherPage;

Route::get('/', HomePage::class)->name("home");
Route::get('/categories', CategoriesPage::class)->name('categories');
Route::get('/categories/{category}/subcategories', SubCategoriesPage::class)->name('subcategories');
Route::get('/categories/{category}/items', CategoriesItemsPage::class)->name('subcategories.items');

Route::get("/items", ItemsPage::class)->name("items");
Route::get("/items/{slug}", ItemShowPage::class)->name("items.show.item");
Route::get('/search/items/{keyword}', SearchPage::class)->name("search");

Route::get("/weather", WeatherPage::class)->name("weather");
Route::get("/story", WeatherPage::class)->name("story");
Route::get("/information", WeatherPage::class)->name("information");
Route::get("/contact-us", ContactUsPage::class)->name("contact.us");

// auth
Route::get('/login', LoginPage::class)->name('login');
Route::get('/register', RegisterPage::class)->name('register');

Route::get("/blog", Posts::class)->name("blogs");
Route::get("/blog/{type}/{slug}", Tags::class)->name("tags");
Route::get("locale/{locale}", LocalizationController::class)->name("locale");

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/profile', UserProfilePage::class)->name('user.profile');
    Route::get('/create/item', ItemCreatePage::class)->name('item.create');
});

Route::get("/{slug}", Page::class)->name("new-page");
