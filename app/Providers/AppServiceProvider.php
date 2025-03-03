<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\FaqComposer;
use App\Http\View\Composers\AchievementComposer;
use App\Http\View\Composers\ServiceComposer;
use App\Http\View\Composers\AboutComposer;
use App\Http\View\Composers\BlogComposer;
use App\Http\View\Composers\ReviewComposer;
use App\Http\View\Composers\SeoComposer;
use App\Models\BlogCategory;
use App\Models\ServiceCategory;
use App\Models\Poster;
use App\Models\Timetable;
use App\Models\SocialLink;
use App\Http\View\Composers\BlogCategoryComposer;
use App\Http\View\Composers\ServiceCategoryComposer;
use App\Http\View\Composers\GalleryComposer;

use Illuminate\Support\Facades\View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', FaqComposer::class);
        View::composer('*', AchievementComposer::class);
        View::composer('*', ServiceComposer::class);
        View::composer('*', AboutComposer::class); 
        View::composer('*', BlogComposer::class);
        View::composer('*', ReviewComposer::class);
        View::composer('*', SeoComposer::class); // Registered SeoComposer
        View::composer('*', BlogCategoryComposer::class);
        View::composer('*', ServiceCategoryComposer::class);
        View::composer('*', GalleryComposer::class);
        View::composer('*', function ($view) {
            $view->with('globalBlogCategories', BlogCategory::all());
        });
        View::composer('*', function ($view) {
            $view->with('globalServiceCategories', ServiceCategory::all());
        });
        try {
            $posters = Poster::all();
            View::share('posters', $posters); // Share globally with all views
        } catch (\Throwable $th) {
            View::share('posters', []);
        }

        try {
            // Fetch timetable from the database
            $timetables = Timetable::all();
            
            // Share globally with all views
            View::share('globalTimetable', $timetables);
        } catch (\Throwable $th) {
            View::share('globalTimetable', []);
        }
        try {
            $socialLinks = SocialLink::all();
            View::share('globalSocialLinks', $socialLinks);
        } catch (\Throwable $th) {
            View::share('globalSocialLinks', []);
        }


    }
}
