<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Product;

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
     * A linord test.
     *
     * @return void
     */
    public function test_linord()
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
