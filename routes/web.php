<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/master-users', [UsersController::class, 'index'])->name('master-users');
Route::get('/master-users/create', [UsersController::class, 'create']);
Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');



Route::get('/master-warga', [WargaController::class, 'index'])->name('master-warga');
Route::get('/master-warga/create', [WargaController::class, 'create']);
Route::post('/warga/store', [WargaController::class, 'store'])->name('warga.store');
Route::get('/master-warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
Route::put('/master-warga/{id}', [WargaController::class, 'update'])->name('warga.update');
Route::delete('/master-warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');


Route::get('/master-criteria', [CriteriaController::class, 'index'])->name('master-criteria');
Route::get('/master-criteria/create', [CriteriaController::class, 'create']);
Route::post('/criteria/store', [CriteriaController::class, 'store'])->name('criteria.store');
Route::get('/master-criteria/{id}/edit', [CriteriaController::class, 'edit'])->name('criteria.edit');
Route::put('/master-criteria/{id}', [CriteriaController::class, 'update'])->name('criteria.update');
Route::delete('/master-criteria/{id}', [CriteriaController::class, 'destroy'])->name('criteria.destroy');



Route::get('/master-subcriteria', [SubCriteriaController::class, 'index'])->name('master-subcriteria');
Route::get('/master-subcriteria/create', [SubCriteriaController::class, 'create']);
Route::post('/subcriteria/store', [SubCriteriaController::class, 'store'])->name('subcriteria.store');
Route::get('/master-subcriteria/{id}/edit', [SubCriteriaController::class, 'edit'])->name('subcriteria.edit');
Route::put('/master-subcriteria/{id}', [SubCriteriaController::class, 'update'])->name('subcriteria.update');
Route::delete('/master-subcriteria/{id}', [SubCriteriaController::class, 'destroy'])->name('subcriteria.destroy');



Route::get('/perhitungan', [PerhitunganController::class,'index'])->name('perhitungan');
Route::get('/hasil-rekomendasi', [RekomendasiController::class, 'index'])->name('hasil-rekomendasi');
