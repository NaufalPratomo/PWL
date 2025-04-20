<?php
namespace App\Http\Controllers;

//Controller sederhana yang menampilkan halaman selamat datang aplikasi. 
//Controller ini hanya memiliki satu method yaitu index() yang mengembalikan view 'welcome' dengan breadcrumb dan menu aktif 'dashboard'.

class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Welcome to Shoe Store Managment Web',
            'list'  => ['Home', 'Welcome']
        ];

        $activeMenu = 'dashboard';

        return view('welcome', ['breadcrumb' => $breadcrumb, 'activeMenu' => $activeMenu]);
    }
}
