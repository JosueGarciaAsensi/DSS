<?php

namespace Database\Seeders;

use App\Models\BeerType;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\User;

class ProductsTableSeeder extends Seeder
{
    protected function getUsers() {
        $users = User::all();
        return $users[random_int(0, count($users)-1)];
    }

    protected function getBeerType() {
        $types = BeerType::all();
        return $types[random_int(0, count($types)-1)];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Heineken', 'Mahou', 'Estrella Galicia', 'Estrella Levante', 'Paulaner', 'San Miguel', 'CruzCampo', 'Steinburg'];
        $description = [
            'Es una cerveza de tipo Lager y estilo Pilsen de color amarillo claro y brillante, con una espuma blanca intensa, cremosa y persistente en el vaso.',
            'Soy la caña',
            'De las mejorcitas que probarás',
            'Si es de la huerta, es que está muy buena',
            'Esto está a otro nivel, sólo para los verdaderos amantes de la cerveza',
            'Estará a la misma altura que el arcangel Miguel?',
            'La favorita de Jordi',
            'No te dejes engañar porque se venda en el Mercadona'
        ];
        $price = [3.0, 1.5, 2, 1.8, 2.5, 1.5, 1.6, 0.79];

        foreach (range(0,4) as $i) {
            $product = new Product();
            $product->name = $names[$i];
            $product->stock = random_int(1, 10);
            $product->description = $description[$i];
            $product->price = $price[$i];
            $product->users()->associate($this->getUsers());
            $product->beer_types()->associate($this->getBeerType());

            $product->save();
        }
    }
}
