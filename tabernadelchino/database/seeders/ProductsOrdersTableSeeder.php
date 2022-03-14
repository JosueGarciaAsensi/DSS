<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ProductOrder;

class ProductsOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,4) as $i) {
            $productOrder = new ProductOrder();
            $productOrder->product_id = $i+1;
            $productOrder->order_id = $i+1;

            $productOrder->save();
        }
    }
}