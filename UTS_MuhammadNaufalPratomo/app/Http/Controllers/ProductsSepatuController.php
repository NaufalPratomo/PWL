<?php

namespace App\Http\Controllers;

class ProductsSepatuController extends Controller
{
    public function index()
    {
        $categories = [
            ['name' => 'ADS', 'route' => '/category/ADIOS'],
            ['name' => 'CMP', 'route' => '/category/COMPASS'],
            ['name' => 'NB', 'route' => '/category/NB'],
            ['name' => 'VTL', 'route' => '/category/VENTELA'],
            ['name' => 'SKT', 'route' => '/category/SKETCHER'],
        ];

        return view('blog.products', ['categories' => $categories]);
    }
}
