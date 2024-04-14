<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


// Route::get('/users',[UserController::class,'index']) ->name('admin.users.index');
// Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('admin.users.edit');
// Route::put('/users/{user}/edit',[UserController::class,'update'])->name('admin.users.update');
// Route::get('users/{user}',[UserController::class,'show'])->name('admin.users.show');
// Route::delete('users/{user}',[UserController::class, 'destroy'])->name('admin.users.destroy');
// Route::delete('users/create',[UserController::class, 'create'])->name('admin.users.create');

// // Ruta para crear un usuarios
// Route::post('/users',[UserController::class, 'store'])->name('admin.users.store');

Route::resource('/users',UserController::class)->names('admin.users');

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
