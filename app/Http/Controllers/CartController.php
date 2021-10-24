<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Repository\InvoiceRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $InvoiceRepository;

    public function __construct(InvoiceRepositoryInterface $InvoiceRepository)
    {
        $this->InvoiceRepository = $InvoiceRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CartRequest $request
     * @return \App\Http\Resources\InvoiceResource
     */
    public function store(CartRequest $request)
    {
        return $this->InvoiceRepository
            ->calculateSubTotal($request)
            ->calculateVAT()
            ->getOffers()
            ->getResource();
    }
}
