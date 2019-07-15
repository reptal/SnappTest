<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\CreateProductsWithExcelRequest;
use App\Imports\ProductsImport;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{

    public function store(CreateProductsWithExcelRequest $request)
    {
        dd($request->validated()['file']);
        dd(\Excel::import(new ProductsImport, 'products.xlsx'));
    }
}
