<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('/forgot-password', [AuthController::class, 'postForgotPassword']);
Route::get('/reset/{token}', [AuthController::class, 'reset']);
Route::post('/reset/{token}', [AuthController::class, 'postReset']);


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardController::class,'dashboard']);
    
    Route::get('/admin/admin/list', [AdminController::class,'list']);
    Route::get('/admin/admin/add', [AdminController::class,'add']);
    Route::post('/admin/admin/add', [AdminController::class,'addAdmin']);
    Route::get('/admin/admin/edit/{id}', [AdminController::class,'edit']);
    Route::post('/admin/admin/edit/{id}', [AdminController::class,'editAdmin']);
    Route::get('/admin/admin/delete/{id}', [AdminController::class,'delete']);

    //class
    Route::get('/admin/class/list', [ClassController::class,'list']);
    Route::get('/admin/class/add', [ClassController::class,'add']);
    Route::post('/admin/class/add', [ClassController::class,'addClass']);
    Route::get('/admin/class/edit/{id}', [ClassController::class,'edit']);
    Route::post('/admin/class/edit/{id}', [ClassController::class,'editClass']);
    Route::get('/admin/class/delete/{id}', [ClassController::class,'delete']);
});

Route::group(['middleware' => 'student'], function () {
    Route::get('/student/dashboard', [DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'parent'], function () {
    Route::get('/parent/dashboard', [DashboardController::class,'dashboard']);
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('/teacher/dashboard', [DashboardController::class,'dashboard']);
});