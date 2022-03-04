<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models;

use App\Models\Product;
use App\Models\BeerType;
use App\Models\User;
use App\Models\Bill;
use App\Models\Order;
use App\Models\Cart;

use function PHPUnit\Framework\assertEquals;

class ProductTest extends TestCase
{
    /**
     * A beertype test.
     *
     * @return void
     */
    public function test_beertype()
    {

        $this->assertEquals(Product::find(1)->beer_type, BeerType::find(1));
    }

    /**
     * A user test.
     *
     * @return void
     */
    public function test_user()
    {
        $this->assertEquals(Product::find(1)->user, User::find(1));
    }

    /**
     * A cart test.
     *
     * @return void
     */
    public function test_cart()
    {
        $orders = Product::find(1)->cart;
        $found = false;

        foreach($orders as $it) {
            if (Cart::find(1)->cart_id == $it->cart_id) {                
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    /**
     * A order test.
     *
     * @return void
     */
    public function test_order()
    {
        $orders = Product::find(1)->order;
        $found = false;

        foreach($orders as $it) {
            if (Order::find(1)->order_id == $it->order_id) {                
                $found = true;
            }
        }
        $this->assertTrue($found);
    }

    /**
     * A bill test.
     *
     * @return void
     */
    public function test_bill()
    {
        $bills = Product::find(1)->bill;
        $found = false;

        foreach($bills as $it) {
            if (Bill::find(1)->bill_id == $it->bill_id) {                
                $found = true;
            }
        }
        $this->assertTrue($found);
    }
}
