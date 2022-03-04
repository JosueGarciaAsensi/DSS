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
        
        $states = ['Pendiente pago', 'Pago realizado', 'Enviado', 'Entregado'];
        
        foreach (range(1,4) as $index) {                
                DB::table('orders')->insert(
                    [    
                        'cart_id' => $index,
                        'user_id' => $index,
                        'state' => $states[random_int(1, 3)]
                    ]
                );
        }
    }
}
