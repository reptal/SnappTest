<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\CreateProductsWithExcelRequest;
use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;
use App\Serializers\Response\JsonResponseSerializer;

class ProductsController extends Controller
{

    /**
     * @param CreateProductsWithExcelRequest $request
     * @param JsonResponseSerializer $jsonResponseSerializer
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateProductsWithExcelRequest $request, JsonResponseSerializer $jsonResponseSerializer)
    {
        \Excel::import(new ProductsImport, $request->file('excel'));
        //send response
        return response()->json($jsonResponseSerializer->serialize([
            'error' => false,
            'message' => 'success',
            'data' => []
        ]));
    }
}
