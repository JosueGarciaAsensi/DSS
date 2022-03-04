<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\BeerType;
use App\Models\Product;

class BeerTypeTest extends TestCase
{
    /**
     * A product test.
     *
     * @return void
     */
    public function test_product()
    {
        $products = BeerType::find(1)->product;
        $found = false;

        foreach ($products as $it) {
            if (Product::find(1) == $it) {
                $found = true;
            }
        }
        $this->assertTrue($found);
    }
}
