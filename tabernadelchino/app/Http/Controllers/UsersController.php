<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin-users', ['users' => $users]);
    }

    public function delete(Request $request) {
        $user = User::find($request->input('id'));
        $user->delete();
        return redirect('/admin-users');
    }
}
