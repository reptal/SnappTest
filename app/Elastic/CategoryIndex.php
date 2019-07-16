<?php


namespace App\Elastic;


use ScoutElastic\IndexConfigurator;

class CategoryIndex extends IndexConfigurator
{
    protected $name = 'categories';

    protected $settings = [

    ];
}
