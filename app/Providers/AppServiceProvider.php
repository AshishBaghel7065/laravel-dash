<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\FaqComposer;
use App\Http\View\Composers\AchievementComposer;
use App\Http\View\Composers\ServiceComposer;
use App\Http\View\Composers\AboutComposer;
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


    }
}
