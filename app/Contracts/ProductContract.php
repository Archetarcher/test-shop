<?php

namespace App\Contracts;

interface ProductContract
{
    public function get(array $params, array $categories): array;

    public function getBySlug(string $slug): array;

    public function create(array $params): array;
}