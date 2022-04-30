<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $orders = Order::paginate(10);

        return view('admin.admin-orders', ['orders' => $orders]);
    }

    public function listOrders(Request $request) {
        $user = User::find($request->input('id'));
        $orders = [];

        if(!is_null($user)) {
            $orders = Order::where('users_id', $user->id)->get();
        }

        if (count($orders) == 0) {
            $orders = [];
        }

        return view('orders')->with('orders', $orders);
    }

    public function filter(Request $request){
        $sign = $_GET['sign'];

        if($sign == 'greater'){
            $sign = '>';
        }
        elseif($sign == 'less'){
            $sign = '<';
        }
        elseif($sign == 'equal'){
            $sign = '=';
        }
        else{
            $sign =  null;
        }

        $state = $_GET['state'];

        if($state == 'to-pay'){
            $state = 'Pendiente pago';
        }
        elseif($state == 'paid'){
            $state = 'Pago realizado';
        }
        elseif($state == 'sent'){
            $state = 'Enviado';
        }
        elseif($state == 'given'){
            $state = 'Entregado';
        }
        elseif($state == 'returned'){
            $state = 'Devuelto';
        }
        else{
            $state = null;
        }

        if($sign != null and $request->input('price') != ""){
            if($state != null){
                $orders = Order::where('total', $sign, $request->input('price'))->paginate(10)
                ->where('state', '=', $state);
            }
            else{
                $orders = Order::where('total', $sign, $request->input('price'))->paginate(10);
            }
        }
        else{
            if($state != null){
                $orders = Order::where('state', '=', $state)->paginate(10);
            }
            else{
                $orders = Order::paginate(10);
            }
        }
        return view('admin.admin-orders', ['orders' => $orders]);
    }
}
