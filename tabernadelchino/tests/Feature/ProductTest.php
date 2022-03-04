<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models;

use App\Models\Product;
use App\Models\BeerType;


class ProductTest extends TestCase
{
    /**
     * A beertype test.
     *
     * @return void
     */
    public function test_beertype()
    {
        $this->assertEquals(Product::find(1)->beertype, BeerType::find(1));
        //$this->fail('Not implemented');
    }

    /**
     * A user test.
     *
     * @return void
     */
    public function test_user()
    {
        // $this->assertEquals(Product::find(1)->user, User::find(1))
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
     * A order test.
     *
     * @return void
     */
    public function test_order()
    {
        $this->fail('Not implemented');
    }

    /**
     * A bill test.
     *
     * @return void
     */
    public function test_bill()
    {
        $this->fail('Not implemented');
    }
}
