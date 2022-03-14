<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Order;
use App\Models\User;
use App\Models\Cart;

class OrderTableSeeder extends Seeder
{
    protected function getUsers() {
        $users = User::all();
        return $users[random_int(1, count($users))];
    }

    protected function getCart() {
        $carts = Cart::all();
        return $carts[random_int(1, count($carts))];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $states = ['Pendiente pago', 'Pago realizado', 'Enviado', 'Entregado', 'Devuelto'];

        foreach (range(0,4) as $i) {
            $order = new Order();
            $order->user()->associate($this->getUsers());
            $order->cart()->associate($this->getCart());
            $order->state = $states[$i];

            $order->save();
        }
    }
}
