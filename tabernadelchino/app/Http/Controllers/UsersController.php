<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Rules\DNIRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // Atributos para controlar filtros
    private $search_admins = true;
    private $search_users = true;

    public function index() {
        $users = User::paginate(10);

        return view('admin.admin-users', ['users' => $users, 'search_admins' => $this->search_admins, 'search_users' => $this->search_users]);
    }

    public function filter(Request $request) {
        if ($request->has('search_admins')) {
            $search_admins = true;
        }
        else {
            $search_admins = false;
        }

        if ($request->has('search_users')) {
            $search_users = true;
        }
        else {
            $search_users = false;
        }

        $users = null;
        if($search_admins != null && $search_users != null) {
            $users = User::paginate(10);
        }
        elseif($search_admins != null){
            $users = User::where('admin', '=', true)->paginate(10);
        }
        elseif ($search_users != null) {
            $users = User::where('admin', '=', false)->paginate(10);
        }

        return view('admin.admin-users', ['users' => $users, 'search_admins' => $search_admins, 'search_users' => $search_users]);
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin-users')->with('success', '¡Usuario eliminado con éxito!');
    }

    public function edit(Request $request, $id) {

        $http_host = $_SERVER["HTTP_HOST"];
        $url = url()->previous();
        $url = str_replace("http://$http_host", '', $url);
        error_log('Venimos de: ' . $url);

        $users = User::all();
        $susers = [];
        foreach($users as $user){
            if($user->email == $request->input('email' . $id) and $user->id != $id) {
                array_push($susers, $user->email);
            }
        }
        $this->validate($request,
            [
                'name' . $id  => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/'],
                'surname'. $id => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/'],
                'email' . $id   => [Rule::notIn($susers)],
                'dni'. $id   =>  [new DNIRule()],
            ],
            [
                'name.regex' => 'El campo nombre debe ser alfabético.',
                'surname.regex' => 'El campo apellido debe ser alfabético.',
                'not_in'    =>  'El email ya está registrado.'
            ]
        );

        $user = User::findOrFail($id);
        if ($request->has('name' . $id)) {
            $user->name = $request->input('name' . $id);
            $user->surname = $request->input('surname' . $id);
            $user->email = $request->input('email' . $id);
            $user->dni = $request->input('dni' . $id);
            if ($url == '/admin-users') {
                if ($request->has('admin' . $id)) {
                    $user->admin = 1;
                } else {
                    $user->admin = 0;
                }
                if ($request->has('visible' . $id)) {
                    $user->visible = 1;
                } else {
                    $user->visible = 0;
                }
            }
            $user->save();
        }

        if ($url == '/admin-users') {
            return redirect($url)->with('success', '¡Usuario editado con éxito!');
        } else if ($url == '/myprofile') {
            $address = Address::find($user->addresses_id);
            return view('myprofile', ['user' => $user, 'address' => $address]);
            //return redirect()->route('myprofile', ['user' => $user, 'address' => $address]);
            //return back()->with('success', '¡Datos actualizados con éxito!');
            //return redirect()->action([UsersController::class, 'myProfile'], ['user' => $user, 'address' => $address]);

        } else {
            return redirect('/index');
        }
    }

    public function create(Request $request) {
        $users = User::all();
        $susers = [];
        foreach($users as $user){
            array_push($susers, $user->email);
        }

        $this->validate($request,
            [
                'name'  => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/'],
                'surname' => ['regex:/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{1,50}$/'],
                'email' =>  [Rule::notIn($susers)],
                'dni'   =>  [new DNIRule()],
                'cp'    => ['regex:/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/']
            ],
            [
                'name.regex' => 'El campo nombre debe ser alfabético.',
                'surname.regex' => 'El campo apellido debe ser alfabético.',
                'cp.regex'  =>  'El código postal no es válido.',
                'not_in' => 'Este email ya está registrado.'
            ]
        );

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
        $user->password = Hash::make($request->input('passwd'));
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

        return redirect('/admin-users')->with('success', '¡Usuario creado con éxito!');
    }

    public function myProfile(Request $request) {
        $user = User::find($request->input('id'));
        $address = Address::find($user->addresses_id);
        return view('myprofile', ['user' => $user, 'address' => $address]);
    }
}
