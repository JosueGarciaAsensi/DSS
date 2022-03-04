<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Address;
use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
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
        $this->assertEquals(User::find(1)->address, Address::find(1));
    }

    /**
     * A linord test.
     *
     * @return void
     */
    public function test_linord()
    {
        $this->fail('Not implemented');
    }

    /**
     * A cart test.
     *
     * @return void
     */
    public function test_cart()
    {
        $this->assertEquals(User::find(1)->cart, Cart::find(1));
    }

    /**
     * A product test.
     *
     * @return void
     */
    public function test_product()
    {
        $products = User::find(1)->product;
        $found = false;

        foreach ($products as $it) {
            if (Product::find(1) == $it) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }
}
