<?php

use App\Livewire\Solicitudes;

use App\Livewire\SolicitudTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\SolicitudesController;


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

Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');

