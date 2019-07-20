<?php

namespace App\Http\Controllers\Api\Web;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Serializers\Response\JsonResponseSerializer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $categoryRepository;
    protected $productRepository;
    protected $jsonResponseSerializer;

    public function __construct(CategoryRepository $categoryRepository, ProductRepository $productRepository, JsonResponseSerializer $jsonResponseSerializer)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->jsonResponseSerializer = $jsonResponseSerializer;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        //get search text
        $searchText = $request->search;
        //search in categories
        $categories = $this->categoryRepository->searchInElastic($searchText);
        //search in products
        $products = $this->productRepository->searchInElastic($searchText);
        //send response
        return response()->json($this->jsonResponseSerializer->serialize([
            'error' => false,
            'message' => 'success',
            'data' => [
                'categories' => $categories,
                'products' => $products
            ]
        ]));

    }
    //
}
