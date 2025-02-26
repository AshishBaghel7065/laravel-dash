<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\SeoPage;

class SeoServiceProvider
{
    public function compose(View $view)
    {
        // Fetch all reviews and share them with the view
        $view->with('seopages', SeoPage::all());
    }
}
