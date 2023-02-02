<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CheckoutControllerTest extends WebTestCase
{
    public function test_checkout_page(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/checkout');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Products In Cart');
    }
}
