<?php

namespace App\Services\Order;

use App\Contracts\OrderProductContract;
use App\Repositories\Interfaces\Order\OrderProductRepositoryInterface;

class OrderProductService implements OrderProductContract
{

    private OrderProductRepositoryInterface $orderProductRepository;

    public function __construct(OrderProductRepositoryInterface $orderProductRepository)
    {
        $this->orderProductRepository = $orderProductRepository;
    }

    public function get(int $order_id): array
    {
        return $this->orderProductRepository->get($order_id);
    }

    public function create(array $data, int $order_id):array
    {
        return $this->orderProductRepository->create($data, $order_id);
    }

 }