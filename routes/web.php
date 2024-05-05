<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivoController;
use App\Http\Controllers\BajaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ActivoController::class, "index"])->name("activo.index");
Route::post('/activo-create', [ActivoController::class, "create"])->name("activo.create");
Route::post('/activo-update', [ActivoController::class, "update"])->name("activo.update");
Route::get('/activo-delete-{id}', [ActivoController::class, "delete"])->name("activo.delete");

Route::post('/baja-create', [BajaController::class, "create"])->name("baja.create");

