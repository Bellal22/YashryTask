<?php

namespace App\Models\Offers;

use App\Interfaces\OfferInterface;

class ShippingOffer implements OfferInterface
{
    public $shipping;
    private $value;
    private $sale;
    public function __construct($shipping)
    {
        $this->shipping = $shipping;
        $this->value = config("constants.offers.shippingOffer");
    }
    public function getOfferName()
    {
        return trans("invoice.offer.shippingOffer",['value' => $this->value , 'sale' => $this->sale]);
    }

    public function calculateAfterOffer($collection)
    {
        $this->sale = $this->value;

        return $this->sale;
    }

}