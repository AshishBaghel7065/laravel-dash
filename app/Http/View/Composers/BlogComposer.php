<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Blog;

class BlogComposer
{
    public function compose(View $view)
    {
        $view->with('blogs', Blog::all());
    }
}

