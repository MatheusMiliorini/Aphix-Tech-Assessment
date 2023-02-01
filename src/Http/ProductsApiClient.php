<?php

namespace App\Http;

use App\Entity\CartProduct;
use App\Entity\Product;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductsApiClient
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchProducts()
    {
        $response = $this->client->request(
            'GET',
            'https://63187261f6b281877c6c9805.mockapi.io/api/v1/products'
        );
        // $statusCode = $response->getStatusCode();
        // $contentType = $response->getHeaders()['content-type'][0];
        // $content = $response->getContent();
        return Product::createFromArray($response->toArray());
    }

    public function fetchCart()
    {
        $response = $this->client->request(
            'GET',
            'https://63187261f6b281877c6c9805.mockapi.io/api/v1/cart'
        );
        // $statusCode = $response->getStatusCode();
        // $contentType = $response->getHeaders()['content-type'][0];
        // $content = $response->getContent();
        return CartProduct::createFromArray($response->toArray());
    }
}
