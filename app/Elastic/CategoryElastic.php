<?php


namespace App\Elastic;


trait CategoryElastic
{
    protected $indexConfigurator = CategoryIndex::class;
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
