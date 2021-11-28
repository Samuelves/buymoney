<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConverterBuyController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TaxesController;
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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/converterbuy', [ConverterBuyController::class, 'index'])->name('converterbuy');
Route::post('/quotation', [ConverterBuyController::class, 'quotation'])->name('quotation');
Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::get('/taxes', [TaxesController::class, 'index'])->name('taxes');
Route::post('/taxes/save', [TaxesController::class, 'save'])->name('taxes.save');