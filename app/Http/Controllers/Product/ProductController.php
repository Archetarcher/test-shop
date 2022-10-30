<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\GetProductsRequest;
use App\Services\Product\CategoryService;
use App\Services\Product\ProductService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class ProductController extends ApiController
{
    /**
     * @param ProductService $productService
     * @param GetProductsRequest $request
     * @return JsonResponse
     */
    public function get(ProductService $productService, CategoryService $categoryService, GetProductsRequest $request): JsonResponse{
        try {
            $validated = $request->validated();

            $categories = [];
            if (isset($validated['category_id'])){
                $categories = $categoryService->getSubCategories($validated['category_id']);
            }

            $result = $productService->get($validated, $categories);

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);
    }

    /**
     * @param ProductService $productService
     * @param string $slug
     * @return JsonResponse
     */
    public function getBySlug(ProductService $productService, string $slug): JsonResponse{
        try {
            $result = $productService->getBySlug($slug);

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);
    }

    /**
     * @param ProductService $productService
     * @param CreateProductRequest $request
     * @return JsonResponse
     */
    public function create(ProductService $productService, CreateProductRequest $request): JsonResponse{
        try {

            $validated = $request->validated();
            $result = $productService->create($validated);

        }catch (Exception $e){
            return $this->sendError($e->getCode(), $e->getMessage(), 500);
        }
        return $this->sendResponse(['body' => $result]);
    }
}
