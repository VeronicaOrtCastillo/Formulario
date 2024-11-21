<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view ('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/pago', [SolicitudController::class, 'create'])->middleware(['auth','verified'])->name('solicitudes.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index']);

Route::get('/admin/Empleados', [HomeController::class,'index'])-> name ('admin.Empleados');

