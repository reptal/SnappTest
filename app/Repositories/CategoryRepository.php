<?php


namespace App\Repositories;


use App\Interfaces\ModelRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function allFromElastic(): Collection
    {
        return Category::search('*')
            ->get();
    }

    /**
     * @param string $search
     * @return Collection
     */
    public function searchInElastic(string $search)
    {
        return Category::search('*' . $search . '*')
            ->get();
    }
}
