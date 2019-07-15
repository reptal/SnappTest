<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Model;

interface ModelRepository
{

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;
}
