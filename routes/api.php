<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Api\MensagemController;
use App\Http\Controllers\Api\TopicoController;
use App\Http\Controllers\Api\UseController;
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
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post("mensagem", [MensagemController::class, 'index']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user', [UseController::class, 'update']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resource ("topico",TopicoController::class);
    Route::resource ("mensagem", MensagemController::class)->except("index");
   });