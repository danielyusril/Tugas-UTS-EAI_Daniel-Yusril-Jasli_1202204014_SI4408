<?php

use App\Http\Controllers\API\logistikController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('logistik', [logistikController::class, 'index']);
Route::post('logistik/input', [logistikController::class, 'input']);
Route::get('logistik/show/{id}', [logistikController::class, 'show']);
Route::post('logistik/update/{id}', [logistikController::class, 'update']);
Route::get('logistik/destroy/{id}', [logistikController::class, 'destroy']);
Route::post('user/register', [UserController::class, 'register']);


