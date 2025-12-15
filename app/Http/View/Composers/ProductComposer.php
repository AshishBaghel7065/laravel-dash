<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Product;

class ProductComposer
{
    public function compose(View $view)
    {
        try {
            $products = Product::all();
            $view->with('globalProducts', $products);
        } catch (\Throwable $th) {
            $view->with('globalProducts', []);
        }
    }
}
