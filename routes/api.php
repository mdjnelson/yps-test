<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::controller(DataController::class)->group(function () {
        Route::get('beers', 'getDataFromApi')->name('getDataFromApi');
    });
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
