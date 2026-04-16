<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin-login','admin.admin-login');
Route::post('/admin-login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/admin-dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
