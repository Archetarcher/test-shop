<?php

namespace App\Contracts;

interface OrderProductContract
{
    public function get(int $order_id): array;

    public function create(array $data, int $order_id): array;


}