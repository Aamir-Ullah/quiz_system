<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/admin-login','admin.admin-login');
Route::post('/admin-login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::get('/admin-dashboard',[AdminController::class,'adminDashboard'])->name('admin.dashboard');
Route::get('/admin-categories',[AdminController::class,'adminCategories'])->name('admin.categories');
Route::get('/admin-logout',[AdminController::class,'adminLogout'])->name('admin.logout');

// Routes for Categories

Route::post("/add-category",[AdminController::class,'addCategory'])->name('admin.add-category');
Route::get("/category/delete/{id}",[AdminController::class,'deleteCategory'])->name('admin.delete-category');
