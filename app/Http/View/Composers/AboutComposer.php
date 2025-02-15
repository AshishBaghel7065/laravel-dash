<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\About;

class AboutComposer
{
    public function compose(View $view)
    {
        $view->with('about', About::all());
    }
}
