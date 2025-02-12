<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Achievement;

class AchievementComposer
{
    public function compose(View $view)
    {
        $view->with('achievements', Achievement::all());
    }
}
