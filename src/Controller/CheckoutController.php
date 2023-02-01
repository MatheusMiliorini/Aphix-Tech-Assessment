<?php
// src/Controller/CheckoutController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CheckoutController extends AbstractController
{

    public function index(): Response
    {
       return new Response(
            '<html><body>Do your thing here!</body></html>'
        );
    }
}