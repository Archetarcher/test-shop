<?php

namespace App\Repositories\Interfaces\Product;

interface CategoryRepositoryInterface
{

    public function getTree();
    public function getSubCategories(int $id);

}