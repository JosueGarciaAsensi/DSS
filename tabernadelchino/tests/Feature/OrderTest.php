<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

class OrderTest extends TestCase
{
    /**
     * A product test.
     *
     * @return void
     */
    public function test_product()
    {
        $products = Order::find(1)->product;
        $found = false;

        foreach ($products as $it) {
            if (Product::find(1)->product_id == $it->product_id) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    /**
     * A user test.
     *
     * @return void
     */
    public function test_user()
    {
        $this->assertEquals(Order::find(1)->user, User::find(1));
    }

    /**
     * A cart test.
     *
     * @return void
     */
    public function test_cart()
    {
        $this->assertEquals(Order::find(1)->cart, Cart::find(1));
    }
}
