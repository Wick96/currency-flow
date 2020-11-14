<?php

use App\Http\Controllers\Page\ApiTokenController;
use App\Http\Controllers\Page\HomeController;
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

Auth::routes(['reset' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/api-token/generate', [ApiTokenController::class, 'generate'])->name('token-generate');
