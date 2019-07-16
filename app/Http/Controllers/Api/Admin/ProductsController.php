<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\CreateProductsWithExcelRequest;
use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Serializers\Response\JsonResponseSerializer;

class ProductsController extends Controller
{
    protected $jsonResponseSerializer;

    public function __construct(JsonResponseSerializer $jsonResponseSerializer)
    {
        $this->jsonResponseSerializer = $jsonResponseSerializer;
    }

    /**
     * @param CreateProductsWithExcelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateProductsWithExcelRequest $request)
    {
        \Excel::import(new ProductsImport, $request->file('excel'));
        //send response
        return response()->json($this->jsonResponseSerializer->serialize([
            'error' => false,
            'message' => 'success',
            'data' => []
        ]));
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function syncElastic()
    {
        $categories = Category::all();
        $categories->searchable();
        //send response
        return response()->json($this->jsonResponseSerializer->serialize([
            'error' => false,
            'message' => 'success',
            'data' => []
        ]));
    }
}
