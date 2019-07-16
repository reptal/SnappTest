<?php


namespace App\Elastic;


use ScoutElastic\IndexConfigurator;


class ProductIndex extends IndexConfigurator
{
    protected $name = 'products';

    protected $settings = [

    ];
}
