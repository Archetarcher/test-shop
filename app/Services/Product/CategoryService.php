<?php

namespace App\Services\Product;

use App\Contracts\CategoryContract;
use App\Repositories\Interfaces\Product\CategoryRepositoryInterface;

class CategoryService implements CategoryContract
{

    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getTree(): array
    {
        return $this->categoryRepository->getTree();
    }
   public function getSubCategories(int $category_id): array
    {
        return $this->categoryRepository->getSubCategories($category_id);
    }

 }