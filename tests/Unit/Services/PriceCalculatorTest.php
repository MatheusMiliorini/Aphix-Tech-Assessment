<?php

namespace Tests\Unit\Services;

use App\Entity\CartProduct;
use App\Services\PriceCalculator;
use PHPUnit\Framework\TestCase;

class PriceCalculatorTest extends TestCase
{
    public function test_calculate_simple()
    {
        $cartProduct = new CartProduct();
        $cartProduct->qty = 10;
        $cartProduct->unitPrice = 50;
        $priceCalculator = new PriceCalculator();
        $priceCalculator->calculate($cartProduct);
        $this->assertEquals(500, $cartProduct->netPrice);
        $this->assertEquals(115, $cartProduct->vatPrice);
        $this->assertEquals(615, $cartProduct->totalPrice);
    }

    public function test_calculate_with_decimals()
    {
        $cartProduct = new CartProduct();
        $cartProduct->qty = 7;
        $cartProduct->unitPrice = 42.99;
        $priceCalculator = new PriceCalculator();
        $priceCalculator->calculate($cartProduct);
        $this->assertEquals(300.93, $cartProduct->netPrice);
        $this->assertEquals(69.21, $cartProduct->vatPrice);
        $this->assertEquals(370.14, $cartProduct->totalPrice);

        $cartProduct->qty = 7;
        $cartProduct->unitPrice = 42.68;
        $priceCalculator->calculate($cartProduct);
        $this->assertEquals(298.76, $cartProduct->netPrice);
        $this->assertEquals(68.71, $cartProduct->vatPrice);
        $this->assertEquals(367.47, $cartProduct->totalPrice);
    }
}
