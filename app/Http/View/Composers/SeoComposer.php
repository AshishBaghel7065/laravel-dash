<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\SeoPage;

class SeoComposer
{
    public function compose(View $view)
    {
        try {
            $seoPages = SeoPage::all();
        } catch (\Throwable $th) {
            $seoPages = [];
        }

        $view->with('seoPages', $seoPages);
    }
}
