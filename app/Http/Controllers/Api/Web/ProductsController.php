<?php

namespace App\Http\Controllers\Api\Web;

use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use App\Serializers\Response\JsonResponseSerializer;

class ProductsController extends Controller
{
    protected $productRepository;
    protected $jsonResponseSerializer;

    /**
     * ProductsController constructor.
     * @param ProductRepository $productRepository
     * @param JsonResponseSerializer $jsonResponseSerializer
     */
    public function __construct(ProductRepository $productRepository, JsonResponseSerializer $jsonResponseSerializer)
    {
        $this->productRepository = $productRepository;
        $this->jsonResponseSerializer = $jsonResponseSerializer;
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(int $id)
    {
        $products = $this->productRepository->allFromElasticByCategoryId($id);
        //send response
        return response()->json($this->jsonResponseSerializer->serialize([
            'error' => false,
            'message' => 'success',
            'data' => [
                'products' => $products
            ]
        ]));

    }
    //
}
