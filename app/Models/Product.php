<?php

namespace App\Models;

use App\Elastic\ProductElastic;
use Illuminate\Database\Eloquent\Model;
use ScoutElastic\Searchable;

class Product extends Model
{
    use Searchable, ProductElastic;

    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    //
}
