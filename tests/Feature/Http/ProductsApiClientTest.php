<?php

namespace Tests\Unit\Http;

use App\Http\ProductsApiClient;
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
        $this->assertIsNumeric($product['productId']);
        $this->assertNotEmpty($product['imageUrl']);
        $this->assertIsNumeric($product['unitPrice']);
        $this->assertNotEmpty($product['productName']);
        $this->assertIsNumeric($product['quantity']);
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
        $this->assertNotNull($product['productId']);
        $this->assertNotEmpty($product['productName']);
        $this->assertIsNumeric($product['unitPrice']);
        $this->assertIsNumeric($product['qty']);
        $this->assertIsNumeric($product['id']);
    }
}
