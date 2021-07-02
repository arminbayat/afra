<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/auth')
    ->namespace('App\Modules\Auth\Controllers')
    ->as('auth.')
    ->group(static function (): void {
        Route::post('/login', 'LoginController')->name('login');
    });
