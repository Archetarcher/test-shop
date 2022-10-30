<?php

namespace App\Contracts;

interface OrderContract
{
    public function get(int $order_id): array;

    public function getByUser(int $user_id): array;

    public function create(array $data): array;


}