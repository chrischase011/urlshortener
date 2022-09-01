<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/{token?}', [PagesController::class, 'index'])->name('generated');
Route::get('/generate', [PagesController::class, 'generate'])->name('generate.index');
Route::post('/generate', [PagesController::class, 'generate'])->name('generate');