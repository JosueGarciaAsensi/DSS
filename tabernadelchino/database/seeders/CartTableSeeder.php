<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Cart;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,4) as $i) {
            $cart = new Cart();
            $cart->status = $i % 2;

            $cart->save();
        }
    }
}
