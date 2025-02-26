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


    }
}
