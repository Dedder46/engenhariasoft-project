<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'role:Empresa'])->group(function () {
    Route::get('/empresa/dashboard', [DashboardController::class, 'empresaDashboard'])->name('empresa.dashboard');
});

Route::middleware(['auth', 'role:Aluno'])->group(function () {
    Route::get('/aluno/dashboard', [DashboardController::class, 'alunoDashboard'])->name('aluno.dashboard');
});
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::middleware(['auth', 'role:Aluno'])->group(function () {
    Route::get('/aluno/dashboard', [StudentController::class, 'index']);
});

Route::middleware(['auth', 'role:Empresa'])->group(function () {
    Route::get('/empresa/dashboard', [CompanyController::class, 'index']);
});
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Crie uma view chamada dashboard.blade.php
    })->name('dashboard');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\OpportunityController;

Route::middleware(['auth', 'role:Empresa'])->group(function () {
    Route::get('/oportunidades/create', [OpportunityController::class, 'create'])->name('oportunidades.create');
    Route::post('/oportunidades', [OpportunityController::class, 'store'])->name('oportunidades.store');
});


Route::middleware(['auth', 'role:Aluno'])->group(function () {
    Route::get('/oportunidades', [OpportunityController::class, 'index'])->name('oportunidades.index');
});

Route::middleware(['auth', 'role:Empresa'])->group(function () {
    Route::get('/empresa/dashboard', [DashboardController::class, 'empresaDashboard'])->name('empresa.dashboard');
});

Route::middleware(['auth', 'role:Aluno'])->group(function () {
    Route::get('/aluno/dashboard', [DashboardController::class, 'alunoDashboard'])->name('aluno.dashboard');
});

