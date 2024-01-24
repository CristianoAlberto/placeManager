<?php

use App\Http\Controllers\PlaceController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/places', [PlaceController::class, 'listByName']);
Route::get('/findPlace/{id}', [PlaceController::class, 'findById']);
Route::post('/createPlace', [PlaceController::class, 'store']);
Route::put('/placeUpdate/{id}', [PlaceController::class, 'update']);
Route::get('/deletePlace/{id}', [PlaceController::class, 'destroy']);