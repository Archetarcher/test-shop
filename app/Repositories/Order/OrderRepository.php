<?php

namespace App\Repositories\Order;

use App\Models\Order\OrderModel;
use App\Repositories\Interfaces\Order\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    public function get(int $id)
    {
        return OrderModel::findOrFail($id)->toArray();
    }

    public function create(array $data)
    {
        return OrderModel::create($data)->toArray();
    }

    public function getByUser(int $user_id)
    {
        return OrderModel::where('user_id', $user_id)
            ->get()
            ->toArray();
    }
}