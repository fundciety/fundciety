<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\BanksController;
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
Route::post('/register' , [AuthController::class, 'register']);
Route::post('/login' , [AuthController::class, 'login']);
Route::post('/catagories', [CatagoriesController::class, 'store']);
Route::post('/banks', [BanksController::class, 'store']);
Route::prefix('projects')->group(function () {
    Route::post('/add', [ProjectsController::class, 'store']);
Route::get('/all', [ProjectsController::class, 'index']);
Route::post('/search', [ProjectsController::class, 'search']);
Route::get('/project/', [ProjectsController::class, 'findbyid']);

});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    Route::get('/user' , [AuthController::class, 'user']);

});