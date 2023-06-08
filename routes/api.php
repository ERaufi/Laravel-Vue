<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeachersController;
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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('teachres', [TeachersController::class, 'getData']);
    Route::post('add_teacher', [TeachersController::class, 'create']);
    Route::delete('delete_teacher/{id}', [TeachersController::class, 'delete']);

    Route::get('get_teacher/{id}', [TeachersController::class, 'getTeacher']);

    Route::post('update_teacher/{id}', [TeachersController::class, 'update']);


    Route::get('user',[AuthController::class,'getUser']);

});
