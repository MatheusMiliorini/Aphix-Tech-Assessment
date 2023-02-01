<?php

namespace App\Services;

use App\Entity\CartProduct;

class PriceCalculator
{
    public function calculate(CartProduct $cartProduct): CartProduct
    {
        $cartProduct->netPrice = (float) number_format($cartProduct->qty * $cartProduct->unitPrice, 2);
        $cartProduct->vatPrice = (float) number_format($cartProduct->netPrice * (23 / 100), 2);
        $cartProduct->totalPrice = (float) number_format($cartProduct->netPrice + $cartProduct->vatPrice, 2);
        return $cartProduct;
    }
}
