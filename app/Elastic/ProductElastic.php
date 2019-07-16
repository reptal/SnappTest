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
        ]
    ];
}
