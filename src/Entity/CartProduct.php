<?php
// src/Controller/Products.php
namespace App\Entity;

use App\Traits\Fillable;

class CartProduct
{
    use Fillable;

    public function __construct()
    {
        $this->fillable = [
            'productId',
            'productName',
            'unitPrice',
            'qty',
            'id',
        ];
    }

    public $productId;
    public $productName;
    public $unitPrice;
    public $qty;
    public $id;
}
