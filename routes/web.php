<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyServiceController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\UniversityServiceController;
use App\Http\Controllers\EventServiceController;
use App\Http\Controllers\JobApplicationController;

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
  
        Route::get('/university', [UniversityServiceController::class, 'create'])->name('services.university.create');
        Route::post('/university', [UniversityServiceController::class, 'store'])->name('services.university.store');
        Route::get('/university/success', [UniversityServiceController::class, 'success'])->name('services.university.success');
        
        Route::get('/event', [EventServiceController::class, 'create'])->name('services.event.create');
        Route::post('/event', [EventServiceController::class, 'store'])->name('services.event.store');
        Route::get('/event/success', [EventServiceController::class, 'success'])->name('services.event.success');
    });
    
    // Trabaja con Nosotros
    Route::get('/job-application', [JobApplicationController::class, 'create'])->name('services.job.application.create');
    Route::post('/job-application', [JobApplicationController::class, 'store'])->name('services.job.application.store');
    Route::get('/job-application/success', [JobApplicationController::class, 'success'])->name('services.job.application.success');
});



Route::prefix('community')->group(function () {
    Route::get('/', [CommunityController::class, 'index'])->name('community.index');
    Route::post('/posts', [CommunityController::class, 'storePost'])->name('community.posts.store');
    Route::post('/posts/{post}/like', [CommunityController::class, 'likePost'])->name('community.posts.like');
    Route::post('/posts/{post}/comment', [CommunityController::class, 'storeComment'])->name('community.posts.comment');
});
