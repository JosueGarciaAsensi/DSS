<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->delete();

        $info = [];
        foreach (range(1, 10) as $index) {

            $users_id = $index;

            foreach(range(1, 10) as $indey) {
                $product_id = $indey;
                $info[] = [$users_id , $product_id];
            }

        }

        foreach (range(1,10) as $index) {                
                DB::table('orders')->insert(
                    [                        
                        'users_id' => $info[$index][0],
                        'product_id' => $info[$index][1],
                        'state' => Str::random(10),
                        'bills_id' => $index                        
                    ]
                );
        }
    }
}
