<?php

namespace App\Services\Product;

use App\Contracts\ProductContract;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;

class ProductService implements ProductContract
{
    private ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function get(array $params, array $categories): array
    {
        return  $this->productRepository->get($params, $categories);
    }

    public function getBySlug(string $slug): array
    {
        return  $this->productRepository->getBySlug($slug);
    }

   public function create(array $params): array
    {
        return  $this->productRepository->create($params);
    }
}