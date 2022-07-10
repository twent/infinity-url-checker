<?php

use App\Http\Controllers\{UrlController, UrlCheckController};
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

require __DIR__.'/auth.php';

Route::get('/', [UrlController::class, 'create'])->name('home')->middleware('guest');
Route::post('/urls/store', [UrlController::class, 'store'])->name('urls.store')->middleware('guest');

/* Dashboard for Verified Admin Users */
Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'dashboard.'], function () {
    Route::get('/', [UrlController::class, 'index'])->name('home');
    /* Materials routes */
    Route::resource('urls', UrlController::class)->except('show','edit', 'update', 'destroy');
    /* Url Checks */
    Route::get('url-checks', [UrlCheckController::class, 'index'])->name('url-checks.index');
});
