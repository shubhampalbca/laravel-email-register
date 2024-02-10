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



Route::get('edit-student/{id}', [UserController::class, 'editstudent'])->name('edit-student');
Route::put('update-student/{id}', [UserController::class, 'studentupdate']);

Route::get('verify-password/{id}', [UserController::class, 'verifypassword']);
Route::post('verify-password/{id}', [UserController::class, 'verifymatch']);



Route::get('verify-delete/{id}', [UserController::class, 'verifydelete']);
Route::post('verify-delete/{id}', [UserController::class, 'verifymatchdelete']);
Route::get('delete-student/{id}', [UserController::class, 'deletestudent'])->name('delete-student');