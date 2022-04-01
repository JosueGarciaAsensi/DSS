<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        $users = User::paginate(10);
        return view('admin-users', ['users' => $users]);
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin-users')->with('success', 'deleted succesfully!');
    }

    public function edit(Request $request, $id) {
        $user = User::findOrFail($id);
        if ($request->has('name' . $id)) {
            $user->name = $request->input('name' . $id);
            $user->surname = $request->input('surname' . $id);
            $user->email = $request->input('email' . $id);
            $user->dni = $request->input('dni' . $id);
            if ($request->has('admin'. $id)) {
                $user->admin = 1;
            }
            else {
                $user->admin = 0;
            }
            $user->save();
        }
        return redirect('/admin-users')->with('success', 'deleted succesfully!');
    }
}
