<?php

namespace App\Models\Offers;

use App\Interfaces\OfferInterface;

class TopsOffer implements OfferInterface
{
    public $products;
    private $value;
    private $sale;

    public function __construct($products)
    {
        $this->products = $products;
        $this->value = config("constants.offers.topsOffer");
    }

    public function getOfferName()
    {
        return trans("invoice.offer.topsOffer", ['value' => $this->value, 'sale' => $this->sale]);
    }

    public function calculateAfterOffer($collection)
    {
        if($collection->where('type','Jacket')->count()) $this->sale = $collection->where('type','Jacket')->first()['price']/2;

        return $this->sale;
    }
}