<?php

use App\Http\Controllers\userController;
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

Route::prefix("/user")->controller(userController::class)->group(function(){
    Route::post("/create","create");
    Route::get("/show","show");
    Route::post("/delete","delete");
    Route::post("/update","update");
    Route::get("/export","export");
});
