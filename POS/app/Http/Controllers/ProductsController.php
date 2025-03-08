<?php

namespace App\Http\Controllers;

class ProductsController extends Controller
{
    public function index()
    {
        $categories = [
            ['name' => 'Food & Beverage', 'route' => '/category/food-beverage'],
            ['name' => 'Beauty & Health', 'route' => '/category/beauty-health'],
            ['name' => 'Home Care', 'route' => '/category/home-care'],
            ['name' => 'Baby & Kid', 'route' => '/category/baby-kid']
        ];

        return view('blog.products', ['categories' => $categories]);
    }
}
