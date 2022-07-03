<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataKecamatanController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

## CMS Route List
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Data Kecamatan
Route::get('/data-kecamatan', [App\Http\Controllers\DataKecamatanController::class, 'index'])->name('dataKecamatan.list');
Route::get('/data-kecamatan/edit/{id}', [App\Http\Controllers\DataKecamatanController::class, 'edit'])->name('dataKecamatan.edit');
Route::post('/data-kecamatan/edit/{id}', [App\Http\Controllers\DataKecamatanController::class, 'postEdit'])->name('dataKecamatan.postEdit');
Route::get('/data-kecamatan/export', [App\Http\Controllers\DataKecamatanController::class, 'export'])->name('dataKecamatan.export');
Route::post('/data-kecamatan', [App\Http\Controllers\DataKecamatanController::class, 'import'])->name('dataKecamatan.import');

Auth::routes();