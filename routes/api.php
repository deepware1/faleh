<?php

use Illuminate\Http\Request;
use App\Api\Auth\Http\AuthController;
use Illuminate\Support\Facades\Route;
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


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/categories/all', [CategoriesController::class, 'getAllCategories']);
Route::get('/categories/{slug}', [CategoriesController::class, 'getCategory']);
Route::get('/categories/{slug}/subcategories', [CategoriesController::class, 'getSubCategories']);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::post('/logout', [AuthController::class, 'logout']);    
});