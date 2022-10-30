<?php

namespace App\Services\Order;

use App\Contracts\OrderContract;
use App\Repositories\Interfaces\Order\OrderRepositoryInterface;

class OrderService implements OrderContract
{
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function get(int $order_id): array
    {
        return $this->orderRepository->get($order_id);
    }

    public function create(array $data): array
    {
        return $this->orderRepository->create($data);
    }


    public function getByUser(int $user_id): array
    {
        return $this->orderRepository->getByUser($user_id);
    }
}