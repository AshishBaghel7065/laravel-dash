<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Review;

class ReviewComposer
{
    public function compose(View $view)
    {
        // Fetch all reviews and share them with the view
        $view->with('reviews', Review::all());
    }
}
