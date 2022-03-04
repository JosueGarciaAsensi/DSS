<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Address;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    /**
     * A address test.
     *
     * @return void
     */
    public function test_address()
    {
        $user = new User([
            'name' => 'Pepe',
            'surname' => 'López',
            'email' => 'ejemplo@gmail.com',
            'password' => Hash::make('123'),
            'dni' => '12378943J',
            'admin' => 0
        ]);
        $user->save();


        //$cart = new Cart(['status' => false]);
        //$user->cart()->save($cart);

        $addr = new Address([
            'type' => 'Calle',
            'name' => 'una random',
            'pc' => '03008'
        ]);
        $user->address()->save($addr);


        print_r($user);

        $this->fail('Not implemented');
    }

    /**
     * A cart test.
     *
     * @return void
     */
    public function test_cart()
    {
        $this->fail('Not implemented');
    }

    /**
     * A product test.
     *
     * @return void
     */
    public function test_product()
    {
        $this->fail('Not implemented');
    }
}
