<?php

namespace App\Models;

use App\Elastic\CategoryElastic;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Category extends Model
{
    use Searchable, CategoryElastic;
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
    //
}
