<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     * @return Product
     */
    public function model(array $row): Product
    {
        return new Product([
            'name' => $row[1],
            'price' => $row[2],
            'description' => $row[3],
            'stock_count' => $row[4],
            'image_url' => $row[5],
            'category_id' => function () use ($row) {
                return Category::firstOrCreate([
                    'name' => $row[0]
                ])->id;
            }
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '1' => Rule::unique('products', 'name'),
        ];
    }

    /**
     * @return int
     */
    public function chunkSize(): int
    {
        return 100;
    }
}
