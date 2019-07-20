<?php

namespace App\Http\Controllers\Api\Web;

use App\Repositories\CategoryRepository;
use App\Serializers\Response\JsonResponseSerializer;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    protected $categoryRepository;
    protected $jsonResponseSerializer;

    /**
     * CategoriesController constructor.
     * @param CategoryRepository $categoryRepository
     * @param JsonResponseSerializer $jsonResponseSerializer
     */
    public function __construct(CategoryRepository $categoryRepository, JsonResponseSerializer $jsonResponseSerializer)
    {
        $this->categoryRepository = $categoryRepository;
        $this->jsonResponseSerializer = $jsonResponseSerializer;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories = $this->categoryRepository->allFromElastic();
        //send response
        return response()->json($this->jsonResponseSerializer->serialize([
            'error' => false,
            'message' => 'success',
            'data' => [
                'categories' => $categories
            ]
        ]));
    }
}
