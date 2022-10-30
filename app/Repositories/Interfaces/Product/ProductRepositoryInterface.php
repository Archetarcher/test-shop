<?php

namespace App\Repositories\Interfaces\Product;

interface ProductRepositoryInterface
{
    public function get(array $params, array $categories);
    public function getBySlug(string $slug);
    public function create(array $data);
}