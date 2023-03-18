<?php

use App\Http\Controllers\API\CategorieController;
use App\Http\Controllers\Api\PlantConroller;
use App\Http\Controllers\Api\plant;
use App\Http\Controllers\ControllerRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Plants api

Route::apiResource('plants', PlantConroller::class)->except(['update']);
Route::put('plants/{plant}', [PlantConroller::class, 'update']);

// categorie api


Route::apiResource('categorie', CategorieController::class);
// Route::put('categorie/{categorie}', [PlantConroller::class, 'update']);

Route::post('register', [ControllerRegister::class, 'register'])->name('register');
Route::post('login', [ControllerRegister::class, 'login'])->name('login');
Route::get('logout', [ControllerRegister::class, 'logout'])->name('logout');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
