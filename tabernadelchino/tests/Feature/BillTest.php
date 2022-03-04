<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductBill;
use Illuminate\Support\Facades\DB;

class BillTest extends TestCase
{
    /**
     * A order test.
     *
     * @return void
     */
    public function test_order()
    {
        $this->assertEquals(Bill::find(1)->order, Order::find(1));
    }

    /**
     * A product test.
     * 
     * @return void
     */
    public function test_product()
    {
        $products = Bill::find(1)->product;
        $found = false;

        foreach($products as $it) {
            if (Product::find(1)->bill_id == $it->bill_id) {                
                $found = true;
            }
        }
        $this->assertTrue($found);
    }
}