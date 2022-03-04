<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

class CartTest extends TestCase
{
    /**
     * A order test.
     *
     * @return void
     */
    public function test_order()
    {
        $orders = Cart::find(1)->order;
        $found = false;

        foreach ($orders as $it) {
            if (Order::find(1) == $it) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    /**
     * A product test.
     *
     * @return void
     */
    public function test_product()
    {
        $products = Cart::find(1)->product;
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
        $this->assertEquals(Cart::find(1)->user, User::find(1));
    }
}
