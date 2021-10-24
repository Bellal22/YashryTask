<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Subtotal' => $this->subTotal,
            'Shipping' => $this->shipping,
            'VAT' => $this->VAT,
            'Discounts' => $this->offers,
            'Total' => $this->afterDiscount + $this->shipping + $this->VAT

        ];
    }
}
