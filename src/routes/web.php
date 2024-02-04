<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

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

// csv導入・・・
// 見た目全体的に見直す


Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'AdminIndex']);
    Route::get('/admin/contact/{index}', [AdminController::class, 'RetJSON']);
    Route::delete('/admin/contact/{index}', [AdminController::class, 'Destroy']);
});

Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'confirm']);
Route::post('/create', [ContactController::class, 'create']);