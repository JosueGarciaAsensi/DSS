<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ProductCart;

class ProductsCartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,4) as $i) {
            $productCart = new ProductCart();
            $productCart->product_id = $i+1;
            $productCart->cart_id = $i+1;

            $productCart->save();
        }
    }
}
