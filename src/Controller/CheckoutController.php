<?php
// src/Controller/CheckoutController.php
namespace App\Controller;

use App\Http\ProductsApiClient;
use App\Services\PriceCalculator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CheckoutController extends AbstractController
{

    public function index(ProductsApiClient $productsApiClient, PriceCalculator $priceCalculator): Response
    {
        $products = $productsApiClient->fetchCart();
        $netTotal = $vatTotal = $total = 0;

        foreach ($products as $product) {
            $priceCalculator->calculate($product);
            $netTotal += $product->netPrice;
            $vatTotal += $product->vatPrice;
            $total    += $product->totalPrice;
        }

        // https://twig.symfony.com/doc/2.x/filters/number_format.html

        return $this->render('checkout.html.twig', [
            'products' => $products,
            'netTotal' => $netTotal,
            'vatTotal' => $vatTotal,
            'total'    => $total,
        ]);
    }
}
