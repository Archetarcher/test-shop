<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Services\Product\CategoryService;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends ApiController
{
    /**
     * @param CategoryService $categoryService
     * @return JsonResponse
     */
    public function categoryTree(CategoryService $categoryService): JsonResponse
    {

        try {
            $result = $categoryService->getTree();

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);

    }

}
