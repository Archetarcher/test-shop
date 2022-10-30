<?php

namespace App\Repositories\Order;

use App\Models\Order\OrderProductModel;
use App\Repositories\Interfaces\Order\OrderProductRepositoryInterface;
use App\Repositories\Interfaces\Order\OrderRepositoryInterface;

class OrderProductRepository implements OrderProductRepositoryInterface
{

    public function get(int $order_id)
    {

        return OrderProductModel::where('order_id', $order_id)
            ->with('product')
            ->get()
            ->toArray();
    }

    public function create(array $data, int $order_id)
    {
        $products = [];
        foreach ($data as $item) {
            $products[] = OrderProductModel::create([
                'order_id'=>$order_id,
                'product_id' => $item['id'],
                'count' => $item['count']
            ])->toArray();
        }
        return $products;
    }
}