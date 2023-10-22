<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;

use App\Models\AnnouncementModel;
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

Route::get('/test', function(){
    return response([
        'message' => 'Api is working'
    ], 200);
});

Route::post('/login', [AuthenticationController::class, 'loginApi']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::get('/announcement', [AnnouncementController::class, 'getannouncement']);//get the single announcement
Route::get('/allannouncements', [AnnouncementController::class, 'getannouncements']);//get the all announcement
Route::post('/requesthogs', [])->middleware('auth:sanctum');
Route::post('/imageupload', [PostController::class, 'imageupload']);
Route::post('/createproduct',[ProductController::class, 'storeApi']);
Route::post('/createexpense',[ExpenseController::class, 'storeApi']);