<?php


namespace App\Repositories;


use App\Interfaces\ModelRepository;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @param int $id
     * @return Collection
     */
    public function allFromElasticByCategoryId(int $id):Collection
    {
        return Product::search('*')
            ->where('category_id', $id)
            ->get();
    }
}
