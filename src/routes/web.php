<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
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

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    });
Route::get('/', [ContactController::class, 'index']);
Route::get('/detail', [AdminController::class, 'detail']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/search', [AdminController::class, 'search']);
Route::get('/contacts/export', [AdminController::class, 'export']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts/return',[ContactController::class,'return']);

Route::post('/modal',  [AdminController::class, 'modal']);