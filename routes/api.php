<?php

use App\Models\Category;
use LaraZeus\Sky\SkyPlugin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Api\Auth\Http\Controllers\AuthController;
use App\Api\Blog\Http\Controllers\BlogController;
use App\Api\Items\Http\Controllers\ItemsController;
use App\Api\General\Http\Controllers\GeneralController;
use App\Api\Categories\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("create-category", function (Request $request) {
    /** @var Category $rec */
    $rec = Category::find(6);

    $file = $rec->addMedia($request->featured_image)
        ->toMediaCollection("categories", SkyPlugin::get()->getUploadDisk());
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/categories/list', [CategoriesController::class, 'getAllCategories']);
Route::get('/categories/search', [CategoriesController::class, 'searchCategories']);
Route::get('/categories/{slug}', [CategoriesController::class, 'getCategory']);
Route::get('/categories/{slug}/subcategories', [CategoriesController::class, 'getSubCategories']);

Route::get('/items/list', [ItemsController::class, 'getAllItems']);
Route::get('/items/search', [ItemsController::class, 'searchItems']);
Route::get('/items/{slug}', [ItemsController::class, 'getItem']);

Route::get('/blog/list', [BlogController::class, 'getAllBlogs']);
Route::get('/blog/{slug}', [BlogController::class, 'getBlog']);


Route::get('/countries/list', [GeneralController::class, 'getAllCountries']);
Route::get('/country/{id}', [GeneralController::class, 'getCountry']);
Route::get('/cities/list', [GeneralController::class, 'getAllCities']);
Route::get('/currencies/list', [GeneralController::class, 'getAllCurrencies']);
Route::get('/users/search', [GeneralController::class, 'searchUsers']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::get('/user/profile', [AuthController::class, 'getProfile']); 
    Route::post('/user/change-password', [AuthController::class, 'changePassword']);   
    Route::post('/items/submit', [ItemsController::class, 'createItem']);
    Route::post('/logout', [AuthController::class, 'logout']);    
});