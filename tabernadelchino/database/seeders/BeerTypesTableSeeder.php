<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\BeerType;

class BeerTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Clásica', 'Especial', 'Tostada', 'Negra', 'Trigo'];

        foreach (range(0,4) as $i) {
            $beertype = new BeerType();
            $beertype->name = $types[$i];

            $beertype->save();
        }
    }
}
