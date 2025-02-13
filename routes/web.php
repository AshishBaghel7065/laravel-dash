<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AchievementController;

use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;

// Public Pages Routes 
Route::get('/', fn() => view('home'));
Route::get('/service', fn() => view('service'));
Route::get('/about', fn() => view('about'));




// Dashboard Routes (Authenticated Routes)
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');
    Route::prefix('dashboard')->name('dashboard.')->group(function () {


        // Pages Routes
        Route::get('service', fn() => view('dashboard.service'))->name('service');
        Route::get('faq', fn() => view('dashboard.faq'))->name('faq');
        Route::get('blog', fn() => view('dashboard.blog'))->name('blog');
        Route::get('contact', fn() => view('dashboard.contact'))->name('contact');
        Route::get('about', fn() => view('dashboard.about'))->name('about');
        Route::get('review', fn() => view('dashboard.review'))->name('review');
        Route::get('achievement', fn() => view('dashboard.achievement'))->name('achievement');
        Route::get('seo', fn() => view('dashboard.seo'))->name('seo');
        Route::get('appointment', fn() => view('dashboard.appointment'))->name('appointment');


        //All FAQ Get Globally without any Routes
        //FAQ GET MEthods
        Route::get('/faq/create', fn() => view('Createandupdate.addfaq'))->name('faq.create.form');
        Route::get('/faq/update/{id}', fn() => view('Createandupdate.updatefaq'))->name('faq.update');
        Route::get('/faq/{id}', [FaqController::class, 'getById'])->name('faq.getById');

        // FAQ CRUD Opration 
        Route::post('/faq/create', [FaqController::class, 'createFaq'])->name('faq.create');
        Route::get('/faq/update/{id}', [FaqController::class, 'edit'])->name('faq.edit');
        Route::post('/faq/update/{id}', [FaqController::class, 'updateFaq'])->name('faq.update');
        Route::delete('/faq/delete/{id}', [FaqController::class, 'deleteFaq'])->name('faq.delete');


         //All FAQ Get Globally without any Routes
        // Show the forms
        Route::get('/achievement/create', [AchievementController::class, 'createAchievementForm'])->name('achievement.create.form');
        Route::get('/achievement/{id}/edit', [AchievementController::class, 'edit'])->name('achievement.edit');
        Route::get('achievement/{id}', [AchievementController::class, 'getById'])->name('achievement.getById');
        // Handle the form submissions
        Route::post('/achievement', [AchievementController::class, 'createAchievement'])->name('achievement.store');
        Route::put('/achievement/{id}', [AchievementController::class, 'updateAchievement'])->name('achievement.update');
        Route::delete('/achievement/{id}', [AchievementController::class, 'destroy'])->name('achievement.destroy');


        // All service routes

        // Show the form to create a new service
        Route::get('/service/create',  fn() => view('Createandupdate.addservice'))->name('service.create.form');
        // Show the form to edit an existing service
        Route::get('/service/update/{id}', fn() => view('Createandupdate.updateservice'))->name('service.update');
        // Get service by ID
        Route::get('/service/{id}', [ServiceController::class, 'getById'])->name('service.getById');
        // Handle form submissions for creating and updating services
        Route::post('/service', [ServiceController::class, 'createService'])->name('service.store');
        Route::put('/service/update/{id}', [ServiceController::class, 'updateService'])->name('service.update');
        // Delete a service
        Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

        
    });
});
















// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    session()->flush(); // Clear session
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');
