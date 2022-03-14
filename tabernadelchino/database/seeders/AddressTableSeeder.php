<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Address;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dirs = ['Médico Pedro Herrero', 'Pais Valencia', 'La Flora', 'Denia', 'Aguilera'];
        $type = ['Calle', 'Avenida', 'Calle', 'Avenida', 'Calle'];
        $pc = ['03006', '03007', '03006', '03010', '03008'];

        foreach (range(0,4) as $i) {
            $address = new Address();
            $address->type = $type[$i];
            $address->name = $dirs[$i];
            $address->pc = $pc[$i];

            $address->save();
        }
    }
}
