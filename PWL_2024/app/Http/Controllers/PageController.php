<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Selamat Datang';
    }

    public function about()
    {
        return 'NIM: 234172075, Nama: Muhammad Naufal Pratomo';
    }

    public function articles($id)
    {
        return 'Halaman Artikel dengan ID ' . $id;
    }
}
