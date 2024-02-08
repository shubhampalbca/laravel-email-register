<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('add-student', [UserController::class, 'create']);

Route::post('/register',[UserController::class,'register']);

Route::get('/otp',[UserController::class,'otp']);

Route::post('verify-otp', [UserController::class, 'verifyOTP']);


Route::get('students', [UserController::class, 'student']);