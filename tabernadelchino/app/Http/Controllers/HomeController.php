<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use GrahamCampbell\ResultType\Success;

class HomeController extends Controller
{
    public function home() {
        return view('index');
    }

    public function about() {
        return view('about');
    }

    public function login($success = '') {
        if ($success != '') {
            return view('auth.login', ['success' => $success]);
        } else {
            return view('auth.login');
        }
    }

    public function register() {
        return view('auth.register');
    }
}
