<?php

use Illuminate\Support\Facades\Route;

// Public
use App\Http\Controllers\PublicController;

// Auth
use App\Http\Controllers\AuthController;

// Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ProfileController;

Route::middleware('web')->group(function () {

    // Public
    Route::get('/', [PublicController::class, 'home']);
    Route::get('/portfolio', [PublicController::class, 'portofolio'])->name('public.portofolio');
    Route::get('/portfolio/{id}', [PublicController::class, 'portofolioDetail'])->name('public.portofolio.detail');
    Route::get('/contact', [PublicController::class, 'contact']);

    // Auth
    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin/login', [AuthController::class, 'authenticate']);
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    //Route AJAX
    Route::get('/home/portfolio', [PublicController::class, 'homePortfolio']);
    Route::get('/home/certificate', [PublicController::class, 'homeCertificate']);


    // Admin
    Route::middleware('auth')->prefix('admin')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('/skills', SkillController::class)->names('admin.skills');
        
        Route::resource('/portfolios', PortofolioController::class)->names('admin.portfolios');

        Route::resource('/certificates', CertificateController::class)->names('admin.certificates');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::post('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');

    });

});