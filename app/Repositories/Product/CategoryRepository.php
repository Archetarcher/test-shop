<?php

namespace App\Repositories\Product;

use App\Models\Product\CategoryModel;
use App\Repositories\Interfaces\Product\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{

     public function getTree()
    {
        return CategoryModel::where('parent_id', 0)->with('subcategory')->get()->toArray();
    }

    public function getSubCategories(int $id)
    {

        $result = [];
        $categories = CategoryModel::where('parent_id', $id)->pluck('id');
        array_push($result, ...$categories);

        foreach ($categories as $category){
            $sub = CategoryModel::where('parent_id', $category)->pluck('id');

            array_push($result, ...$sub);
        }
        return $result;
    }
}