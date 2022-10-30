<?php

namespace App\Contracts;

interface CategoryContract
{
    public function getTree(): array;
    public function getSubCategories(int $category_id): array;

}