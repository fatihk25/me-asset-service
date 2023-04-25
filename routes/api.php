<?php

use App\Http\Controllers\AssetController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('assets')->group(function () {
    Route::post('/register', [AssetController::class, 'register']);
    Route::patch('/update/{id}', [AssetController::class, 'edit']);
    Route::get('/{id}', [AssetController::class, 'detail']);
    Route::delete('/delete/{id}', [AssetController::class, 'delete']);
});