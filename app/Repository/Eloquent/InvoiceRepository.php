<?php

namespace App\Repository\Eloquent;

use App\Http\Resources\InvoiceResource;
use App\Models\Offers\ShippingOffer;
use App\Models\Offers\ShoesOffer;
use App\Models\Offers\TopsOffer;
use App\Repository\InvoiceRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    /**
     * @var mixed
     */
    public $products;
    public $ordered_products;
    public $subTotal;
    public $shipping;
    public $VAT;
    public $afterDiscount;
    public $offers;

    /**
     * InvoiceRepository constructor.
     *
     */
    public function __construct()
    {
        $this->products = collect(config('constants.products'));
        $this->subTotal = 0;
        $this->afterDiscount = 0;
        $this->shipping = 0;
        $this->VAT = 0;
        $this->offers = [];
    }

    /**
     * @param $request
     * @return \App\Repository\Eloquent\InvoiceRepository
     */
    public function calculateSubTotal($request): InvoiceRepository
    {
        $this->ordered_products = $this->products->whereIn('type',$request->products);
        $this->subTotal = $this->ordered_products->sum('price');
        $this->calculateShipping();
        return $this ;
    }

    public function calculateShipping(): void
    {
        foreach ($this->ordered_products as $product)
        {
            $shipping_rate = $this->needle(config('constants.shipping_cost') , 'country' , $product['origin']);
            $this->shipping += (($product['weight']*1000)/config('constants.shipping_per_gram')) * $shipping_rate['rate'];
        }
    }

    public function calculateVAT(): InvoiceRepository
    {
       $this->VAT =  ($this->subTotal * config('constants.VAT')) / 100;
       return $this;
    }

    public function getOffers(): InvoiceRepository
    {
        $offerInstances = [];
        $this->afterDiscount = $this->subTotal;

        if (count($this->ordered_products->where('type','Shoes')) >= 1) $offerInstances[] = new ShoesOffer($this->ordered_products);
        if (count($this->ordered_products->where('tops',1)) >= 2) $offerInstances[] = new TopsOffer($this->ordered_products);
        if (count($this->ordered_products) >= 2 ) $offerInstances[] = new ShippingOffer($this->shipping);

        foreach ($offerInstances as $offerInstance)
        {
            $this->afterDiscount -= $offerInstance->calculateAfterOffer($this->ordered_products);
            $this->offers[] = $offerInstance->getOfferName();
        }

        return $this;
    }

    public function getResource(): InvoiceResource
    {
        return new InvoiceResource($this);
    }

    private function needle($array , $key , $value)
    {
        return $array[array_search($value,array_column($array, $key))];
    }
}