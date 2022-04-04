<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
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
            if ($request->has('visible'. $id)) {
                $user->visible = 1;
            }
            else {
                $user->visible = 0;
            }
            $user->save();
        }
        return redirect('/admin-users')->with('success', 'edited succesfully!');
    }

    public function create(Request $request) {
        $address = new Address();
        $address->type = $request->input('type');
        $address->name = $request->input('address');
        $address->pc = $request->input('cp');
        $address->save();

        $cart = new Cart();
        $cart->status = 0;
        $cart->save();

        $user = new User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->password = $request->input('passwd');
        $user->email = $request->input('email');
        $user->dni = $request->input('dni');
        if ($request->has('admin')) {
            $user->admin = 1;
        }
        else {
            $user->admin = 0;
        }
        if ($request->has('visible')) {
            $user->visible = 1;
        }
        else {
            $user->visible = 0;
        }

        $user->carts()->associate($cart);
        $user->addresses()->associate($address);
        $user->save();

        return back();
    }
}
