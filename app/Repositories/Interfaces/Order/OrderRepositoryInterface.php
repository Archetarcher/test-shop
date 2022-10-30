<?php

namespace App\Repositories\Interfaces\Order;

interface OrderRepositoryInterface
{

    public function get(int $id);
    public function create(array $data);
    public function getByUser(int $user_id);
}