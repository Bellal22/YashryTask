<?php

namespace App\Models\Offers;

use App\Interfaces\OfferInterface;

class ShoesOffer implements OfferInterface
{
    public $products;
    private $value;
    private $sale;
    public function __construct($products)
    {
        $this->products = $products;
        $this->value = config("constants.offers.shoesOffer");
    }
    public function getOfferName()
    {
        return trans("invoice.offer.shoesOffer",['value' => $this->value , 'sale' => $this->sale]);
    }

    public function calculateAfterOffer($collection)
    {
        $price = $collection->where('type','Shoes')->first()['price'];
        $this->sale =  $price - ($price - ($price * $this->value / 100));
        return $this->sale;
        /**
         * @deprecated
         */
       // $filtered = $collection->map(function($item,$key) {
       //     if ($item['type'] == 'Shoes') $item['price'] = $item['price'] - ($item['price'] * $this->value / 100);
       //     return $item;
       //});
       // return $filtered;
    }
}