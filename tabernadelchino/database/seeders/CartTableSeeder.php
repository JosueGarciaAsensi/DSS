<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->delete();
        // Añadimos una entrada a esta tabla
        
        $info = [];
        foreach (range(1, 10) as $index) {

            $votes = $index;
            $users_id = $index;

            foreach(range(1, 10) as $indey) {
                $product_id = $indey;

                $info[] = [$votes, $users_id , $product_id];
            }

        }

        print(strval($info));

        foreach (range(1,10) as $index) {
                DB::table('carts')->insert(
                    [
                        'votes' => $info[$index][0],
                        'users_id' => $info[$index][1],
                        'product_id' => $info[$index][2]                        
                    ]
                );
        }
    }
}
