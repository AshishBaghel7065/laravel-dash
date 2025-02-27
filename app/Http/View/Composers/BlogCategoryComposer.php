<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\BlogCategory;

class BlogCategoryComposer
{
    public function compose(View $view)
    {
        try {
            $blogCategories = BlogCategory::all();
        } catch (\Throwable $th) {
            $blogCategories = [];
        }

        $view->with('globalBlogCategories', $blogCategories);
    }
}
