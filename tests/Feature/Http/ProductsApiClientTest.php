<?php

namespace Tests\Feature\Http;

use App\Http\ProductsApiClient;
use App\Services\PriceCalculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductsApiClientTest extends KernelTestCase
{
    public function test_fetchProducts()
    {
        self::bootKernel();
        $container = static::getContainer();
        /** @var ProductsApiClient */
        $productsApi = $container->get(ProductsApiClient::class);

        $result = $productsApi->fetchProducts();
        $this->assertNotEmpty($result);
        $this->assertIsArray($result);
        $product = $result[0];
        $this->assertIsNumeric($product->productId);
        $this->assertNotEmpty($product->imageUrl);
        $this->assertIsNumeric($product->unitPrice);
        $this->assertNotEmpty($product->productName);
        $this->assertIsNumeric($product->quantity);
    }

    public function test_fetchCart()
    {
        self::bootKernel();
        $container = static::getContainer();
        /** @var ProductsApiClient */
        $productsApi = $container->get(ProductsApiClient::class);

        $result = $productsApi->fetchCart();
        $this->assertNotEmpty($result);
        $this->assertIsArray($result);
        $product = $result[0];
        $this->assertNotNull($product->productId);
        $this->assertNotEmpty($product->productName);
        $this->assertIsNumeric($product->unitPrice);
        $this->assertIsNumeric($product->qty);
        $this->assertIsNumeric($product->id);
    }

    public function test_cart_sum()
    {
        self::bootKernel();
        $container = static::getContainer();
        /** @var ProductsApiClient */
        $productsApi = $container->get(ProductsApiClient::class);
        $priceCalculator = new PriceCalculator();
        $products = $productsApi->fetchCart();
        $netTotal = $vatTotal = $total = 0;
        foreach ($products as $product) {
            $priceCalculator->calculate($product);
            $netTotal += $product->netPrice;
            $vatTotal += $product->vatPrice;
            $total    += $product->totalPrice;
        }
        $this->assertEquals($netTotal + $vatTotal, $total);
    }
}
