<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyServiceController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/validar-dni', [AuthController::class, 'validarDNI'])->name('validar.dni');

Route::middleware('auth')->group(function () {
    // Página de bienvenida después del registro/login
    //Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');
    
    // Dashboard principal - ESTA ES LA RUTA QUE FALTABA
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Perfil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
// Dentro del grupo de autenticación
Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile');
    Route::post('/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::delete('/photo', [ProfileController::class, 'removePhoto'])->name('profile.photo.remove');
});
    
    // Servicios
   

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

    
Route::prefix('services')->group(function () {
    // Rutas para empresa
    Route::get('/company', [ServiceController::class, 'createCompany'])->name('services.company.create');
    Route::post('/company', [ServiceController::class, 'storeCompany'])->name('services.company.store');
    Route::get('/company/success', [ServiceController::class, 'success'])->name('services.company.success');
  
        Route::get('/university', [ServiceController::class, 'createUniversity'])->name('services.university.create');
        Route::post('/university', [ServiceController::class, 'storeUniversity'])->name('services.university.store');
        
        Route::get('/event', [ServiceController::class, 'createEvent'])->name('services.event.create');
        Route::post('/event', [ServiceController::class, 'storeEvent'])->name('services.event.store');
    });
    
    // Trabaja con Nosotros
    Route::get('/job-application', [JobApplicationController::class, 'create'])->name('job.application.create');
    Route::post('/job-application', [JobApplicationController::class, 'store'])->name('job.application.store');
});