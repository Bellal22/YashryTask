<?php
return [
      'products' =>
      [
        [
            'type' => 'T-shirt',
            'price' => '30.99',
            'origin' => 'US',
            'weight' => '0.2',
            'tops' => 1
        ],
        [
            'type' => 'Blouse',
            'price' => '10.99',
            'origin' => 'UK',
            'weight' => '0.3',
            'tops' => 1
        ],
        [
            'type' => 'Pants',
            'price' => '64.99',
            'origin' => 'UK',
            'weight' => '0.9',
            'tops' => 0
        ],
        [
            'type' => 'Sweatpants',
            'price' => '84.99',
            'origin' => 'CN',
            'weight' => '1.1',
            'tops' => 0
        ],
        [
            'type' => 'Jacket',
            'price' => '199.99',
            'origin' => 'US',
            'weight' => '2.2',
            'tops' => 0
        ],
        [
            'type' => 'Shoes',
            'price' => '79.99',
            'origin' => 'CN',
            'weight' => '1.3',
            'tops' => 0
        ],
    ],
    'shipping_cost' =>
    [
        [
            'country' => 'US',
            'rate' => '2'
        ],
        [
            'country' => 'UK',
            'rate' => '3'
        ],
        [
            'country' => 'CN',
            'rate' => '2'
        ]
    ],
    'currency' => [
        'name' => 'dollar',
        'sign' => '$'
    ],
    'offers' =>
    [
        'topsOffer' => '50',
        'shippingOffer' => '10',
        'shoesOffer' => '10'
    ],
    'shipping_per_gram' => '100',
    'VAT' => '14'
];