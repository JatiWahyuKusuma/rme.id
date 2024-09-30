<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CadGhopoController;
use App\Http\Controllers\CadSGController;
use App\Http\Controllers\DashboardCadanganSprAdmController;
use App\Http\Controllers\DashboardVendorSprAdmController;
use App\Http\Controllers\GhopoCadController;
use App\Http\Controllers\GhopoVenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SGCadController;
use App\Http\Controllers\SGVenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenGhopoController;
use App\Http\Controllers\VenSGController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

// Route Login
Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login_process'])->name('login');
});
Route::post('/keluar', [LogoutController::class, 'index'])->name('logout');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/dashboard_user', function () {
        return view('user.dashboard');
    });
});

Route::group(['middleware' => 'auth:superadmin'], function () {
    Route::get('/ghopocad', [GhopoCadController::class, 'index'])->name('superadmin.ghopocad');
});

//Routes Superadmin

Route::group(['prefix' => 'dashboardcadangan'], function () {
    Route::get('/', [DashboardCadanganSprAdmController::class, 'index']);
    Route::post('/list', [DashboardCadanganSprAdmController::class, 'list']);
});
Route::group(['prefix' => 'dashboardvendor'], function () {
    Route::get('/', [DashboardVendorSprAdmController::class, 'index']);
    Route::post('/list', [DashboardVendorSprAdmController::class, 'list']);
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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/list', [AdminController::class, 'list']);
    Route::get('/create', [AdminController::class, 'create']);
    Route::post('/', [AdminController::class, 'store']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::get('/{id}/edit', [AdminController::class, 'edit']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);
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

//Routes Admin GHOPO Tuban
Route::group(['prefix' => 'cadanganghopo'], function () {
    Route::get('/', [CadGhopoController::class, 'index']);
    Route::post('/list', [CadGhopoController::class, 'list']);
    Route::get('/create', [CadGhopoController::class, 'create']);
    Route::post('/', [CadGhopoController::class, 'store']);
    Route::get('/{id}', [CadGhopoController::class, 'show']);
    Route::get('/{id}/edit', [CadGhopoController::class, 'edit']);
    Route::put('/{id}', [CadGhopoController::class, 'update']);
    Route::delete('/{id}', [CadGhopoController::class, 'destroy']);
});

Route::group(['prefix' => 'vendorghopo'], function () {
    Route::get('/', [VenGhopoController::class, 'index']);
    Route::post('/list', [VenGhopoController::class, 'list']);
    Route::get('/create', [VenGhopoController::class, 'create']);
    Route::post('/', [VenGhopoController::class, 'store']);
    Route::get('/{id}', [VenGhopoController::class, 'show']);
    Route::get('/{id}/edit', [VenGhopoController::class, 'edit']);
    Route::put('/{id}', [VenGhopoController::class, 'update']);
    Route::delete('/{id}', [VenGhopoController::class, 'destroy']);
});

//Routes Admin SG Rembang
Route::group(['prefix' => 'cadangansg'], function () {
    Route::get('/', [CadSGController::class, 'index']);
    Route::post('/list', [CadSGController::class, 'list']);
    Route::get('/create', [CadSGController::class, 'create']);
    Route::post('/', [CadSGController::class, 'store']);
    Route::get('/{id}', [CadSGController::class, 'show']);
    Route::get('/{id}/edit', [CadSGController::class, 'edit']);
    Route::put('/{id}', [CadSGController::class, 'update']);
    Route::delete('/{id}', [CadSGController::class, 'destroy']);
});

Route::group(['prefix' => 'vendorsg'], function () {
    Route::get('/', [VenSGController::class, 'index']);
    Route::post('/list', [VenSGController::class, 'list']);
    Route::get('/create', [VenSGController::class, 'create']);
    Route::post('/', [VenSGController::class, 'store']);
    Route::get('/{id}', [VenSGController::class, 'show']);
    Route::get('/{id}/edit', [VenSGController::class, 'edit']);
    Route::put('/{id}', [VenSGController::class, 'update']);
    Route::delete('/{id}', [VenSGController::class, 'destroy']);
});

