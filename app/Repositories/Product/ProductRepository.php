<?php

namespace App\Repositories\Product;

use App\Models\Product\ProductModel;
use App\Repositories\Interfaces\Product\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function get(array $params, array $categories)
    {
        error_log(json_encode($params));
        $productQuery = ProductModel::where(function ($query) use ($params, $categories) {
                foreach ($params as $key => $value) {
                        $query->orWhere($key, $value);
                }
                foreach ($categories as $category){
                    $query->orWhere('category_id', $category);
                }

        });

        if (isset($params['cost'])){
            $productQuery->where('cost', '>=', $params['cost'][0])
                ->where('cost', '<=', $params['cost'][1]);
        }



        return $productQuery->get()->toArray();
    }

    public function getBySlug(string $slug)
    {
        return ProductModel::where('slug', $slug)
            ->get()
            ->toArray();
    }

    public function create(array $data){
        return ProductModel::create($data)->toArray();
    }

}