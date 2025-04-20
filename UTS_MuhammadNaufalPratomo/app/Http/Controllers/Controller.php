<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//Controller dasar yang digunakan sebagai 
//parent class untuk semua controller lainnya dalam 
//aplikasi. Controller ini meng-extend BaseController 
//dari Laravel dan menggunakan trait AuthorizesRequests 
//dan ValidatesRequests yang menyediakan fungsi-fungsi 
//dasar untuk otorisasi dan validasi request.

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
