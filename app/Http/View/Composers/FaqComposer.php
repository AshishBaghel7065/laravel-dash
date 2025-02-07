<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Faq;

class FaqComposer
{
    public function compose(View $view)
    {
        $view->with('faqs', Faq::all());
    }
}
