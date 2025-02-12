<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;


// Pages Routes 

Route::get('/', function () {
    return view('home');
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/about', function () {
    return view('about');
});




// Dashboard Routes 
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::prefix('dashboard')->group(function () {
        // Service Page
        Route::get('service', function () {
            return view('dashboard.service');
        })->name('dashboard.service');

        // FAQ Page
        Route::get('faq', function () {
            return view('dashboard.faq');
        })->name('dashboard.faq');

        // Blog Page
        Route::get('blog', function () {
            return view('dashboard.blog');
        })->name('dashboard.blog');

        // Contact Page
        Route::get('contact', function () {
            return view('dashboard.contact');
        })->name('dashboard.contact');

        // About Page
        Route::get('about', function () {
            return view('dashboard.about');
        })->name('dashboard.about');

        // Review Page
        Route::get('review', function () {
            return view('dashboard.review');
        })->name('dashboard.review');

        // Achievement Page
        Route::get('achievement', function () {
            return view('dashboard.achievement');
        })->name('dashboard.achievement');

        // SEO Page
        Route::get('seo', function () {
            return view('dashboard.seo');
        })->name('dashboard.seo');

        // Appointment Page
        Route::get('appointment', function () {
            return view('dashboard.appointment');
        })->name('dashboard.appointment');

        Route::get('/faq/create', function () {
            return view('Createandupdate.addfaq'); // This points to resources/views/Createandupdate/addfaq.blade.php
        })->name('faq.create.form');

        Route::get('/faq/update/{id}', function () {
            return view('Createandupdate.updatefaq'); // This points to resources/views/Createandupdate/addfaq.blade.php
        })->name('faq.update');
        
    });
});


// GET DATA Without  Auth 
// routes/web.php
Route::get('/dashboard/faq/{id}', [FaqController::class, 'getById'])->name('faq.getById');
Route::post('/faq/create', [FaqController::class, 'createFaq'])->name('faq.create');




// Show the edit form
Route::get('/faq/update/{id}', [FaqController::class, 'edit'])->name('faq.edit');
// Handle the update request
Route::post('/faq/update/{id}', [FaqController::class, 'updateFaq'])->name('faq.update');
Route::delete('/faq/delete/{id}', [FaqController::class, 'deleteFaq'])->name('faq.delete');



use App\Http\Controllers\AchievementController;

// Achievement Routes
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('achievements', [AchievementController::class, 'getDashboardAchievements'])->name('achievement');
    Route::get('/achievement/{id}', [AchievementController::class, 'getById'])->name('achievement.getById');
    Route::get('achievement/create', [AchievementController::class, 'createAchievementForm'])->name('achievement.create');
    Route::post('achievement', [AchievementController::class, 'createAchievement'])->name('achievement.store');
    Route::get('achievement/{id}/edit', [AchievementController::class, 'edit'])->name('achievement.edit');
    Route::put('achievement/{id}', [AchievementController::class, 'updateAchievement'])->name('achievement.update');
    Route::delete('achievement/{id}', [AchievementController::class, 'deleteAchievement'])->name('achievement.delete');
});

// For Home page or general public view
Route::get('achievements', [AchievementController::class, 'getAllAchievements'])->name('achievements.all');


// GET DATA With Auth 






















Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    session()->flush(); // Clear session
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');






