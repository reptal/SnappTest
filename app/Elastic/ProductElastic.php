<?php


namespace App\Elastic;


trait  ProductElastic
{
    protected $indexConfigurator = ProductIndex::class;
    protected $searchRules = [
        //
    ];

    protected $mapping = [
        'properties' => [
            'name' => [
                'type' => 'text',
            ],
            'price' => [
                'type' => 'integer'
            ],
            'description' => [
                'type' => 'text'
            ],
            'stock_count' => [
                'type' => 'integer'
            ],
            'image_url' => [
                'type' => 'text'
            ],
            'category_id' => [
                'type' => 'integer'
            ]
        ]
    ];
}
