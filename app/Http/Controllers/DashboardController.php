<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('menu.Aplikasi1.index');
    }
    public function contoh()
    {
        return view('contoh');
    }
}
