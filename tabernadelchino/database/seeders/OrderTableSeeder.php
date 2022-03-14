<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Order;

class OrderTableSeeder extends Seeder
{
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
            $order->cart_id = $i+1;
            $order->user_id = $i+1;
            $order->state = $states[$i];

            $order->save();
        }
    }
}
