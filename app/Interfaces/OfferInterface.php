<?php

namespace App\Interfaces;

interface OfferInterface
{
    public function getOfferName();
    public function calculateAfterOffer($collection);
}