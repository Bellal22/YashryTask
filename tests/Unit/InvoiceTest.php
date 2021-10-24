<?php

namespace Tests\Unit;

use Tests\TestCase;

class InvoiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_asserting_an_exact_json_match()
    {
        $this->json('POST','api/carts', ['products' => ['T-shirt']])
            ->assertExactJson([
                'data' => [
                    "Subtotal" => 30.99,
                    "Shipping" => 4,
                    "VAT" => 4.3386,
                    "Discounts" => [],
                    "Total" => 39.328599999999994
                ]
            ]);
        $this->assertTrue(true);
    }
}
