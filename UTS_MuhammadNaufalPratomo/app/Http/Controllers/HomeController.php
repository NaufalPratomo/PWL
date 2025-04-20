<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Controller sederhana yang berfungsi untuk menampilkan halaman home blog. 
//Controller ini hanya memiliki satu method yaitu index() yang mengembalikan view 'blog.home'.

class HomeController extends Controller
{
    public function index()
    {
        return view('blog.home');
    }
}
