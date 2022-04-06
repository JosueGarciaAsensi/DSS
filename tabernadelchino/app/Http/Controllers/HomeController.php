<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home() {
        return view('index');
    }

    public function about() {
        return view('about');
    }
}
