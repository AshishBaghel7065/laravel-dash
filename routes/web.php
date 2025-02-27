<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SeoPageController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\BlogCategoryController;

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
        Route::get('/service/create',  fn() => view('Createandupdate.addservice'))->name('service.create.form');
        Route::get('/service/update/{id}', fn() => view('Createandupdate.updateservice'))->name('service.update');
        Route::get('/service/category/create', fn() => view('Createandupdate.addservicecategory'))->name('service.addservicecategory');
        // Get service by ID

        Route::get('/service/{id}', [ServiceController::class, 'getById'])->name('service.getById');
        Route::post('/service', [ServiceController::class, 'createService'])->name('service.store');
        Route::get('/service/update/{id}', [ServiceController::class, 'getByIds'])->name('service.getByIds');
        Route::put('/service/update/{id}', [ServiceController::class, 'updateService'])->name('service.update');
        Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');




        // Display all service categories in the dashboard
        Route::get('/service/create', [ServiceCategoryController::class, 'getAll'])->name('Createandupdate.addservice');
        Route::get('/service/category/create', [ServiceCategoryController::class, 'getAll2'])->name('Createandupdate.addservicecategory');
        Route::post('/service/category/create', [ServiceCategoryController::class, 'create'])->name('service.category.create');
        Route::delete('/service/category/{id}', [ServiceCategoryController::class, 'delete'])->name('service.category.delete');
             


        // All about routes
        Route::get('/about/create',  fn() => view('Createandupdate.addabout'))->name('about.create.form');
        // Route::get('/about/update/{id}', fn() => view('Createandupdate.updateabout'))->name('about.update');
        Route::get('/about/{id}', [AboutController::class, 'getByIds'])->name('about.getByIds');
        Route::post('/about', [AboutController::class, 'createUpdateAbout'])->name('about.store');
        Route::get('/about/update/{id}', [AboutController::class, 'getById'])->name('about.getById');
        Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
        Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');




        Route::get('/blog/create', fn() => view('Createandupdate.addblog'))->name('blog.create.form');
        Route::post('/blog', [BlogController::class, 'createBlog'])->name('blog.store');
        Route::get('/blog/{id}', [BlogController::class, 'getByIds'])->name('blog.getByIds');
        Route::get('/blog/update/{id}', [BlogController::class, 'getByIds'])->name('blog.getByIds');
        Route::put('/blog/update/{id}', [BlogController::class, 'updateBlog'])->name('blog.update');
        Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');


        // Blog Category Routes
        Route::get('/blog/create', [BlogCategoryController::class, 'getAll'])->name('Createandupdate.addblog');
        Route::get('/blog/category/create', [BlogCategoryController::class, 'getAll2'])->name('Createandupdate.addservicecategory');
        Route::get('/blog/update/', [BlogCategoryController::class, 'getAll3'])->name('Createandupdate.updateblog');
        Route::post('/blog/category/create', [BlogCategoryController::class, 'create'])->name('blog.category.create');
        Route::delete('/blog/category/{id}', [BlogCategoryController::class, 'delete'])->name('blog.category.delete');
        

   

        Route::get('/review/create', fn() => view('Createandupdate.addreview'))->name('review.create.form');
        Route::post('/review/create', [ReviewController::class, 'createReview'])->name('review.store');
        Route::get('/review/{id}', [ReviewController::class, 'getById'])->name('blog.getById');
        Route::get('/review/update/{id}', [ReviewController::class, 'getByIds'])->name('review.getByIds');
        Route::put('/review/update/{id}', [ReviewController::class, 'updateReview'])->name('review.update');
        Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');


        

        Route::get('/contact', [ContactController::class, 'getDashboardContacts'])->name('contact.get');
        Route::get('/appointment', [ContactController::class, 'getDashboardContacts2'])->name('contact.get');
        Route::get('/', [ContactController::class, 'getDashboardContacts3'])->name('contact.get');
        Route::delete('/contact/delete/{id}', [ContactController::class, 'deleteContact'])->name('contact.delete');
        Route::get('/contact/{id}', [ContactController::class, 'getById'])->name('contact.get');


        Route::get('/seopages', [SeoPageController::class, 'dashboard'])->name('dashboard.seopages');
        Route::post('/seopages/store', [SeoPageController::class, 'store'])->name('seopages.store');
        Route::get('/seopages/{id}', [SeoPageController::class, 'show'])->name('seopages.show'); // JSON Response
        Route::get('/seopages/update/{id}', [SeoPageController::class, 'getByIds'])->name('seopages.getByIds');
        Route::put('/seopages/update/{id}', [SeoPageController::class, 'update'])->name('seopages.update');
        Route::delete('/seopages/delete/{id}', [SeoPageController::class, 'destroy'])->name('seopages.delete');
       

        
        


    });
});




Route::post('/contact/create', [ContactController::class, 'createContact'])->name('contact.create');


    

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    session()->flush(); // Clear session
    return redirect('/login')->with('success', 'Logged out successfully.');
})->name('logout');
