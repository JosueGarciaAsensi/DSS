<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use GrahamCampbell\ResultType\Success;

class HomeController extends Controller
{
    public function index() {
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

    public function resetPassword(Request $request) {
        $user = User::where('email', '=', $request->input('email'))->first();
        $user->password = Hash::make($user->dni);
        $user->save();
        return redirect('login')->with('success', 'Password reset to email');
    }
}
