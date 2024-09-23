<?php

use App\Http\Controllers\GhopoCadController;
use App\Http\Controllers\GhopoVenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SGCadController;
use App\Http\Controllers\SGVenController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.template');
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['prefix' => 'ghopocad'], function () {
    Route::get('/', [GhopoCadController::class, 'index']);
    Route::post('/list', [GhopoCadController::class, 'list']);
    Route::get('/create', [GhopoCadController::class, 'create']);
    Route::post('/', [GhopoCadController::class, 'store']);
    Route::get('/{id}', [GhopoCadController::class, 'show']);
    Route::get('/{id}/edit', [GhopoCadController::class, 'edit']);
    Route::put('/{id}', [GhopoCadController::class, 'update']);
    Route::delete('/{id}', [GhopoCadController::class, 'destroy']);
});

Route::group(['prefix' => 'ghopoven'], function () {
    Route::get('/', [GhopoVenController::class, 'index']);
    Route::post('/list', [GhopoVenController::class, 'list']);
    Route::get('/create', [GhopoVenController::class, 'create']);
    Route::post('/', [GhopoVenController::class, 'store']);
    Route::get('/{id}', [GhopoVenController::class, 'show']);
    Route::get('/{id}/edit', [GhopoVenController::class, 'edit']);
    Route::put('/{id}', [GhopoVenController::class, 'update']);
    Route::delete('/{id}', [GhopoVenController::class, 'destroy']);
});

Route::group(['prefix' => 'sgcad'], function () {
    Route::get('/', [SGCadController::class, 'index']);
    Route::post('/list', [SGCadController::class, 'list']);
    Route::get('/create', [SGCadController::class, 'create']);
    Route::post('/', [SGCadController::class, 'store']);
    Route::get('/{id}', [SGCadController::class, 'show']);
    Route::get('/{id}/edit', [SGCadController::class, 'edit']);
    Route::put('/{id}', [SGCadController::class, 'update']);
    Route::delete('/{id}', [SGCadController::class, 'destroy']);
});
Route::group(['prefix' => 'sgven'], function () {
    Route::get('/', [SGVenController::class, 'index']);
    Route::post('/list', [SGVenController::class, 'list']);
    Route::get('/create', [SGVenController::class, 'create']);
    Route::post('/', [SGVenController::class, 'store']);
    Route::get('/{id}', [SGVenController::class, 'show']);
    Route::get('/{id}/edit', [SGVenController::class, 'edit']);
    Route::put('/{id}', [SGVenController::class, 'update']);
    Route::delete('/{id}', [SGVenController::class, 'destroy']);
});
