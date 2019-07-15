<?php

namespace App\Imports;

use App\Exceptions\CustomValidationException;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Serializers\Excel\CreateProductSerializer;
use App\Services\Validation\ProductExcelValidator;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    protected $categoryRepository;
    protected $productSerializer;
    protected $productRepository;
    protected $productExcelValidator;

    /**
     * ProductsImport constructor.
     */
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->productSerializer = new CreateProductSerializer();
        $this->productRepository = new ProductRepository();
        $this->productExcelValidator = new ProductExcelValidator();
    }

    /**
     * @param Collection $rows
     * @throws CustomValidationException
     * @return void
     */
    public function collection(Collection $rows): void
    {
        $this->productExcelValidator->validate($rows->toArray());
        $products = [];
        //for each row
        foreach ($rows as $row) {
            //create the category
            $category = $this->categoryRepository->create([
                'name' => $row[0]
            ]);
            //change row cat name with cat id
            $row[0] = $category->id;
            //create array of products to Insert
            $products[] = $this->productSerializer->serialize($row->toArray());
        }
        //if we have any product ready to insert
        if (count($products) > 0) {
            //bulk insert products
            $this->productRepository->bulkCreate($products);
        }

    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            1 => Rule::unique('products', 'name'),
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
