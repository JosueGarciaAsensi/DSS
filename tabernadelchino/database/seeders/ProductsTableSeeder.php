<?php

namespace Database\Seeders;

use App\Models\BeerType;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;

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
        $names = ['Heineken', 'Mahou', 'Estrella Galicia', 'Estrella Levante', 'Paulaner', 'San Miguel', 'CruzCampo', 'Voll Damm', 'Franciskaner'];
        $description = [
            'Es una cerveza de tipo Lager y estilo Pilsen de color amarillo claro y brillante, con una espuma blanca intensa, cremosa y persistente en el vaso.',
            'Soy la caña',
            'De las mejorcitas que probarás',
            'Si es de la huerta, es que está muy buena',
            'Esto está a otro nivel, sólo para los verdaderos amantes de la cerveza',
            'Estará a la misma altura que el arcangel Miguel?',
            'La favorita de Jordi',
            'No hay descripcion que describa esta cerveza',
            'Hmmmm........'
        ];
        $price = [3.0, 1.5, 2, 1.8, 2.5, 1.5, 1.6, 0.79, 2];
        $images = [
            'https://www.heineken.com/media-us/01pfxdqq/heineken-original-bottle.png?quality=85',
            'https://www.beers2rock.com/wp-content/uploads/cervezaartesana_Mahou_Cinco_Estrellas_beers2rock-1.png',
            'https://estrellagaliciausa.com/wp-content/uploads/2021/09/eg-especial.png',
            'https://www.estrelladelevante.es/sites/default/files/2019-10/Levante_Hover_0.png',
            'https://img.saveur-biere.com/img/p/1599-55205.jpg',
            'https://www.bodecall.com/images/stories/virtuemart/product/san-miguel-especial-25.png',
            'https://www.bodecall.com//media/ordersave/1932%7Ccruzcampo-botella-33.png',
            'https://static.damm.com/sites/default/files/2022-02/ED_VOLL_DAMM_BOTTLE_2022.png',
            'https://www.bodecall.com/images/stories/virtuemart/product/franziskaner-weissbier-dunkel.png'
        ];

        foreach (range(0,8) as $i) {
            $product = new Product();
            $product->name = $names[$i];
            $product->stock = random_int(1, 10);
            $product->description = $description[$i];
            $product->price = $price[$i];
            $product->visible = true;
            $product->image = $images[$i];
            $product->users()->associate($this->getUsers());
            $product->beer_types()->associate($this->getBeerType());

            $product->save();
        }
    }
}
