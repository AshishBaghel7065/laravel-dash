<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\ServiceCategory;

class ServiceCategoryComposer
{
    public function compose(View $view)
    {
        try {
            $serviceCategories = ServiceCategory::all();
        } catch (\Throwable $th) {
            $serviceCategories = [];
        }

        $view->with('globalServiceCategories', $serviceCategories);
    }
}
