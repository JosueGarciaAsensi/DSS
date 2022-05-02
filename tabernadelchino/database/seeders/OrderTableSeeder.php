<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class OrderTableSeeder extends Seeder
{
    protected function getUsers() {
        $users = User::all();
        return $users[random_int(0, count($users)-1)];
    }

    protected function getProducts() {
        $products = Product::all();
        return $products;
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
            $order->users()->associate($this->getUsers());
            $order->state = $states[$i];
            $order->total = random_int(100, 1000);

            $order->save();

            $products = $this->getProducts();
            $indexes = array();
            foreach (range(0, count($products)-1) as $i) {
                $indexes[] = $i;
            }
            shuffle($indexes);
            foreach ($indexes as $i) {
                $product = $products[$i];
                if (!is_null($product)) {
                    $order->products()->attach($product);
                }
                $test = random_int(0, 3);
                if ($test == 0) {
                    break;
                }
            }
        }
    }
}
