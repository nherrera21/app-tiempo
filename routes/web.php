<?php

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
//     return view('index');
// });

use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'index']);
Route::get('/tiempo', [WebController::class, 'index']);
Route::post('/tiempo', [WebController::class, 'getWeather']);