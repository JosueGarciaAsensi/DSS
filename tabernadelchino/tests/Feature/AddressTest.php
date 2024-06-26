<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\Assert;
use Tests\TestCase;

use App\Models\Address;
use App\Models\User;

use function PHPUnit\Framework\assertEquals;

class AddressTest extends TestCase
{
    /**
     * A user test.
     *
     * @return void
     */
    public function test_user()
    {
        $this->assertEquals(Address::find(1)->user, User::find(1));
    }
}
