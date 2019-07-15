<?php


namespace App\Repositories;


use App\Interfaces\ModelRepository;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements ModelRepository
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return Product::create($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function bulkCreate(array $data): bool
    {
        return Product::insert($data);
    }
}
