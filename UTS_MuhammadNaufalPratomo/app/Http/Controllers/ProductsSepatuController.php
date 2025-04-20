<?php

namespace App\Http\Controllers;

//Controller sederhana yang menampilkan halaman produk sepatu dengan kategori-kategori yang telah ditentukan. 
//Controller ini hanya memiliki satu method yaitu index() yang mengembalikan view 'blog.products' dengan data kategori sepatu.

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
