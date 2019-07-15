<?php


namespace App\Repositories;


use App\Interfaces\ModelRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements ModelRepository
{

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return Category::create($data);
    }
}
