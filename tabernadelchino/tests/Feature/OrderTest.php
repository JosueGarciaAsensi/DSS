<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Bill;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;

class OrderTest extends TestCase
{
    /**
     * A bill test.
     *
     * @return void
     */
    public function test_bill()
    {
        $this->assertEquals(Order::find(1)->bill, Bill::find(1));
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
