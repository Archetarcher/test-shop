<?php

namespace App\Repositories\Interfaces\Order;

interface OrderProductRepositoryInterface
{
    public function get(int $order_id);
    public function create(array $data, int $order_id);

}