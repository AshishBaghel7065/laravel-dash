<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Gallery;

class GalleryComposer
{
    public function compose(View $view)
    {
        $view->with('galleries', Gallery::all());
    }
}
