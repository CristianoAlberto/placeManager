<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/places', [PlaceController::class, 'listByName']);
Route::get('/findPlace/{id}', [PlaceController::class, 'findById']);
Route::post('/createPlace', [PlaceController::class, 'store']);
Route::put('/placeUpdate/{id}', [PlaceController::class, 'update']);