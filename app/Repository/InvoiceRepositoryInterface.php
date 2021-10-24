<?php

namespace App\Repository;

use App\Http\Resources\InvoiceResource;
use App\Repository\Eloquent\InvoiceRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface InvoiceRepositoryInterface
{
    public function calculateSubTotal($request): InvoiceRepository;
    public function calculateVAT(): InvoiceRepository;
    public function getOffers(): InvoiceRepository;
    public function getResource(): InvoiceResource;
}